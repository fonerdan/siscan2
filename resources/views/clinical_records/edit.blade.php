@extends('adminlte::page')

@section('title', 'Editar Ficha Clínica')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@stop

@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto w-75">
        <div class="card-header bg-dark">
            <h4>Editar Ficha Clínica</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('clinical_records.update', $clinicalRecord) }}" method="POST">
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

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Esterilizado</label>
                            <select name="sterilized" id="sterilized" class="form-control">
                                <option value="1" {{$clinicalRecord->sterilized == 1 ? 'selected' : ''}}>Si</option>
                                <option value="0" {{$clinicalRecord->sterilized == 0 ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Temperatura</label>
                            <input type="text" name="temp" id="temp" class="form-control" value="{{ $clinicalRecord->temp }}">
                            @error('temp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Peso</label>
                            <input type="text" name="weight" id="weight" class="form-control" value="{{ $clinicalRecord->weight }}">
                            @error('weight')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Peso</label>
                            <input type="text" name="weight" id="weight" class="form-control" value="{{ $clinicalRecord->weight }}">
                            @error('weight')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Edad</label>
                            <input type="text" name="age" id="age" class="form-control" value="{{ $clinicalRecord->age }}">
                            @error('age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" name="color" id="color" class="form-control" value="{{ $clinicalRecord->color }}">
                            @error('color')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="required">Observación</label>
                            <textarea name="observation" id="observation" class="form-control" rows="3">{{$clinicalRecord->observation}}</textarea>
                            @error('observation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('clinical_records.index') }}" class="btn btn-warning text-bold">Cancelar</a>
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

@stop
