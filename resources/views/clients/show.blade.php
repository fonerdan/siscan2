@extends('adminlte::page')

@section('title', 'Información del Cliente')

@section('content')
<div class="container mt-2">
    <div class="card">
        <div class="card-header bg-dark">
            <h4>Información del Cliente</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('images/'.$client->photo)}}" alt="client_photo" class="img-thumbnail" width="450" height="450">
                </div>
                <div class="col-md-6 mt-2">
                    <p><strong>Código:</strong> {{ "A". str_pad($client->code, 7, '0', STR_PAD_LEFT) }}</p>
                    <p><strong>Nombre:</strong> {{ $client->name }}</p>
                    <p><strong>Carnet de Identidad:</strong> {{ $client->ci }}</p>
                    <p><strong>Expedido:</strong> {{ $client->expedition }}</p>
                    <p><strong>Teléfono:</strong> {{ $client->phone }}</p>
                    <p><strong>Teléfono de Referencia:</strong>
                        @if ($client->reference_phone == null)
                            <span class="badge badge-warning">No tiene un teléfono de referencia registrado.</span>
                        @endif
                        {{ $client->reference_phone }}
                    </p>
                    <p><strong>Dirección:</strong>
                        @if ($client->home == null)
                            <span class="badge badge-warning">No tiene una dirección registrada.</span>
                        @endif
                        {{ $client->home }}
                    </p>
                    <p><strong>Calle:</strong>
                        @if ($client->street == null)
                            <span class="badge badge-warning">No tiene una calle registrada.</span>
                        @endif
                        {{ $client->street }}</p>
                    <p><strong>Número:</strong>
                        @if ($client->number == null)
                            <span class="badge badge-warning">No tiene un número registrado.</span>
                        @endif
                        {{ $client->number }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('clients.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>

@stop
