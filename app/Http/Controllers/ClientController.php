<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\AnesthesiaSurgeries;
use App\Models\Animal;
use App\Models\Client;
use App\Models\Internment;
use App\Models\PaymentCommitment;
use App\Models\SedationAnesthesia;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:clients.index')->only('index');
        $this->middleware('can:clients.create')->only('create', 'store');
        $this->middleware('can:clients.edit')->only('edit', 'update');
        $this->middleware('can:clients.destroy')->only('destroy');
    }

    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }
    public function store(StoreRequest $request)
    {
        $idProgressive = Client::max('id') + 1;
        $code = str_pad($idProgressive, 7, '0', STR_PAD_LEFT);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        Client::create([
            'code' => $code,
            'name' => $request->name,
            'ci' => $request->ci,
            'expedition' => $request->expedition,
            'home' => $request->home,
            'street' => $request->street,
            'number' => $request->number,
            'phone' => $request->phone,
            'reference_phone' => $request->reference_phone,
            'photo' => $name,
        ]);
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Cliente creado con éxito');
        return redirect()->route('clients.index');
    }
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(UpdateRequest $request, Client $client)
    {
        $name = $client->photo;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $client->update([
            'name' => $request->name,
            'ci' => $request->ci,
            'expedition' => $request->expedition,
            'home' => $request->home,
            'street' => $request->street,
            'number' => $request->number,
            'phone' => $request->phone,
            'reference_phone' => $request->reference_phone,
            'photo' => $name,
        ]);
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Cliente actualizado con éxito');
        return redirect()->route('clients.index');
    }


    public function getAnimals(Client $client)
    {
        return $client->animals;
    }

    public function destroy(Client $client)
    {

        $hasAnimals = Animal::where('client_id', $client->id)->exists();

        if ($hasAnimals) {
            notyf()->duration(2000)->position('y', 'top')->addWarning('Este cliente tiene mascotas asociadas. No se puede eliminar.');
            return redirect()->route('clients.index');
        }

        $hasCommitments = PaymentCommitment::where('client_id', $client->id)->exists();

        if ($hasCommitments) {
            notyf()->duration(2000)->position('y', 'top')->addWarning('Este cliente tiene compromisos de pago asociados. No se puede eliminar.');
            return redirect()->route('clients.index');
        }

        $hasAnesthesiaSurgeries = AnesthesiaSurgeries::where('client_id', $client->id)->exists();

        if ($hasAnesthesiaSurgeries) {
            notyf()->duration(2000)->position('y', 'top')->addWarning('Este cliente tiene anestesias y cirugías asociadas. No se puede eliminar.');
            return redirect()->route('clients.index');
        }

        $hasSedationAnesthesia = SedationAnesthesia::where('client_id', $client->id)->exists();

        if ($hasSedationAnesthesia) {
            notyf()->duration(2000)->position('y', 'top')->addWarning('Este cliente tiene sedaciones y anestesias asociadas. No se puede eliminar.');
            return redirect()->route('clients.index');
        }

        $hasInternment = Internment::where('client_id', $client->id)->exists();

        if ($hasInternment) {
            notyf()->duration(2000)->position('y', 'top')->addWarning('Este cliente tiene incrementos asociados. No se puede eliminar.');
            return redirect()->route('clients.index');
        }

        $client->delete();

        notyf()->duration(2000)->position('y', 'top')->addSuccess('Cliente eliminado con éxito');
        return redirect()->route('clients.index');
    }

}
