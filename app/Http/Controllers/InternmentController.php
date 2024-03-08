<?php

namespace App\Http\Controllers;

use App\Http\Requests\Internment\StoreRequest;
use App\Http\Requests\Internment\UpdateRequest;
use App\Models\Animal;
use App\Models\Client;
use App\Models\Internment;
use Illuminate\Http\Request;

class InternmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:internments.index')->only('index');
        $this->middleware('can:internments.create')->only('create', 'store');
        $this->middleware('can:internments.edit')->only('edit', 'update');
        $this->middleware('can:internments.destroy')->only('destroy');
    }

    public function index()
    {
        $internments = Internment::with('client', 'animal')->get();
        return view('internments.index', compact('internments'));
    }

    public function create()
    {
        $clients = Client::all();
        $animals = Animal::all();
        return view('internments.create', compact('clients', 'animals'));
    }

    public function store(StoreRequest $request)
    {
        Internment ::create($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Internamiento creado con éxito.');
        return redirect()->route('internments.index');
    }

    public function pdf(Internment $internment)
    {
        $pdf = \PDF::loadView('internments.pdf', compact('internment'));
        return $pdf->stream('internment.pdf');
    }
    public function pdfAll()
    {
        $internments = Internment::with('client', 'animal')->get();
        $pdf = \PDF::loadView('internments.pdf_all', compact('internments'));
        return $pdf->stream('internments.pdf');
    }

    public function export(Request $request)
    {
        $fecha_inicio = \Carbon\Carbon::parse($request->initial_date)->startOfDay();
        $fecha_fin = \Carbon\Carbon::parse($request->final_date)->endOfDay();
        $internments = Internment::with('client', 'animal')
            ->whereBetween('created_at', [$fecha_inicio, $fecha_fin])
            ->get();
        $pdf = \PDF::loadView('internments.export', compact('internments'));
        return $pdf->stream('internments.pdf');
    }
    public function edit(Internment $internment)
    {
        $clients = Client::all();
        $animals = Animal::all();
        $selectedClientId = $internment->client_id;
        $selectedAnimalId = $internment->animal_id;
        return view('internments.edit', compact('internment', 'clients', 'animals', 'selectedClientId', 'selectedAnimalId'));
    }
    public function update(UpdateRequest $request, Internment $internment)
    {
        $internment->update($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Internamiento actualizado con éxito.');
        return redirect()->route('internments.index');
    }

    public function destroy(Internment $internment)
    {
        $internment->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Internamiento eliminado con éxito.');
        return redirect()->route('internments.index');
    }
    public function uploadImage(Request $request, Internment $internment)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/internments_images/', $name);

        }
        $internment = Internment::find($internment->id);
        $internment->photo = $name;
        $internment->save();

        notyf()->duration(2000)->position('y', 'top')->addSuccess('Comprobante subido con éxito');
        return redirect()->back();
    }
}
