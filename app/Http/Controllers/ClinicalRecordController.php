<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClinicalRecord\StoreRequest;
use App\Http\Requests\ClinicalRecord\UpdateRequest;
use App\Models\Animal;
use App\Models\Client;
use App\Models\ClinicalRecord;
use Illuminate\Http\Request;

class ClinicalRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:clinical_records.index')->only('index');
        $this->middleware('can:clinical_records.create')->only('create', 'store');
        $this->middleware('can:clinical_records.edit')->only('edit', 'update');
        $this->middleware('can:clinical_records.destroy')->only('destroy');
    }

    public function index()
    {
        $clinical_records = ClinicalRecord::with('client', 'user', 'animal')->get();
        return view('clinical_records.index', compact('clinical_records'));
    }

    public function create()
    {
        $clients = Client::all();
        $animals = Animal::all();
        return view('clinical_records.create', compact('clients', 'animals'));
    }

    public function store(StoreRequest $request)
    {
        auth()->user()->clinicalRecords()->create($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Registro clínico creado con éxito');
        return redirect()->route('clinical_records.index');
    }

    public function pdf(ClinicalRecord $clinical_records)
    {
        $pdf = \PDF::loadView('clinical_records.pdf', compact('clinical_records'));
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('clinical_record.pdf');
    }

    public function pdfAll()
    {
        $clinicalRecords = ClinicalRecord::with('client', 'user')->get();
        $pdf = \PDF::loadView('clinical_records.pdf_all', compact('clinicalRecords'));
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('clinical_records.pdf');
    }

    public function export(Request $request)
    {
        $fecha_inicio = \Carbon\Carbon::parse($request->initial_date)->startOfDay();
        $fecha_fin = \Carbon\Carbon::parse($request->final_date)->endOfDay();
        $clinicalRecords = ClinicalRecord::with('client', 'animal')
            ->whereBetween('created_at', [$fecha_inicio, $fecha_fin])
            ->get();
        $pdf = \PDF::loadView('clinical_records.export', compact('clinicalRecords'));
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('clinical_records.pdf');
    }
    public function exportForClient(Request $request, Client $client)
    {
        $clinicalRecords = ClinicalRecord::with('client', 'animal')
            ->where('client_id', $client->id)
            ->get();
        $pdf = \PDF::loadView('reports.index', compact('clinicalRecords'));
        $pdf = $pdf->setPaper('a4', 'landscape');
    }

    public function edit(ClinicalRecord $clinicalRecord)
    {
        $clients = Client::all();
        $animals = Animal::all();
        $selectedClientId = $clinicalRecord->client_id;
        $selectedAnimalId = $clinicalRecord->animal_id;
        return view('clinical_records.edit', compact('clinicalRecord', 'clients', 'animals', 'selectedClientId', 'selectedAnimalId'));
    }

    public function update(UpdateRequest $request, ClinicalRecord $clinicalRecord)
    {
        $clinicalRecord->update($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Registro clínico actualizado con éxito');
        return redirect()->route('clinical_records.index');
    }

    public function destroy(ClinicalRecord $clinicalRecord)
    {
        $clinicalRecord->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Registro clínico eliminado con éxito');
        return redirect()->route('clinical_records.index');
    }

    public function uploadImage(Request $request, ClinicalRecord $clinicalRecord)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/clinical_record_images/', $name);
        }

        $clinicalRecord = ClinicalRecord::find($clinicalRecord->id);
        $clinicalRecord->photo = $name;
        $clinicalRecord->save();

        notyf()->duration(2000)->position('y', 'top')->addSuccess('Comprobante subido con éxito');
        return redirect()->back();
    }
}
