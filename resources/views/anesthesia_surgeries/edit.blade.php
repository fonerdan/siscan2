@extends('adminlte::page')

@section('title', 'Editar Acta de Cirugía de Anestesia')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@stop

@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto w-75">
        <div class="card-header bg-dark">
            <h4>Editar Acta de Cirugía de Anestesia</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('anesthesia_surgeries.update', $anesthesiaSurgery) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="client_id" id="client_id" class="form-control select2">
                                <option></option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{$client->id == $selectedClientId ? 'selected' : ''}}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mascota</label>
                            <select name="animal_id" id="animal_id" class="form-control animal_id">
                                <option></option>
                                @foreach ($animals as $animal)
                                    <option value="{{ $animal->id }}" {{$animal->id == $selectedAnimalId ? 'selected' : ''}}>{{ $animal->name }}</option>
                                @endforeach
                            </select>
                            @error('animal_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Propietario</label>
                            <select name="type_client" id="type_client" class="form-control">
                                <option selected disabled>Seleccione una opción</option>
                                <option value="Propietario" {{$anesthesiaSurgery->type_client == 'Propietario' ? 'selected' : ''}}>Propietario</option>
                                <option value="Representante del Propietario" {{$anesthesiaSurgery->type_client == 'Representante del Propietario' ? 'selected' : ''}}>Representante del Propietario</option>
                            </select>
                            @error('type_client')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Otro Propietario</label>
                            <input type="text" name="other_type_client" class="form-control" value="{{ $anesthesiaSurgery->other_type_client }}" placeholder="Nombre del otro propietario">
                            @error('other_type_client')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('anesthesia_surgeries.index') }}" class="btn btn-warning text-bold">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js')
    <script>
        $('.select2').select2(
            {
                placeholder: "Seleccione un cliente",
                allowClear: true,
                width: '100%',
                theme: 'classic',
                language: {
                    noResults: function() {
                    return "No hay resultados";
                    },
                    searching: function() {
                    return "Buscando..";
                    }
                }
            }
        );
    </script>

    <script>
        $('.animal_id').select2(
            {
                placeholder: "Seleccione un mascota",
                allowClear: true,
                width: '100%',
                theme: 'classic',
                language: {
                    noResults: function() {
                    return "No hay resultados";
                    },
                    searching: function() {
                    return "Buscando..";
                    }
                }
            }
        );
    </script>
@stop
