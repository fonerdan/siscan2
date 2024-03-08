@extends('adminlte::page')

@section('title', 'Información de la Mascota')

@section('content')
<div class="container mt-2">
    <div class="card">
        <div class="card-header bg-dark">
            <h4>Información de la Mascota</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('animal_images/'.$animal->photo)}}" alt="animal_photo" class="img-thumbnail" width="450" height="450">
                </div>
                <div class="col-md-6 mt-2">
                    <p><strong>Propietario:</strong> {{ $client->name }} - {{ "A". str_pad($client->code, 7, '0', STR_PAD_LEFT) }}</p>
                    <p><strong>Nombre:</strong> {{ $animal->name }}</p>
                    <p><strong>Especie:</strong> {{ $animal->specie }}</p>
                    <p><strong>Raza:</strong> {{ $animal->race }} </p>
                    <p><strong>Género:</strong> {{ $animal->gender }} </p>
                    <p><strong>Pelaje:</strong> {{ $animal->fur }} </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('animals.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>

@stop
