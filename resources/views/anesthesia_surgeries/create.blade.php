@extends('adminlte::page')

@section('title', 'Registrar Acta de Autorización de Anestesia y Cirugía')

@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card w-75 m-auto">
        <div class="card-header bg-dark">
            <h4>Registrar Acta de Autorización de Anestesia y Cirugía</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('anesthesia_surgeries.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Cliente</label>
                            <select name="client_id" id="client_id" class="form-control client_id">
                                @foreach ($clients as $client)
                                    <option></option>
                                    <option value="{{ $client->id }}" {{old('client_id') == $client->id? 'selected' : ''}}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Mascota</label>
                            <select name="animal_id" id="animal_id" class="form-control animal_id">
                                @foreach ($animals as $animal)
                                    <option></option>
                                    <option value="{{ $animal->id }}" {{old('animal_id') == $animal->id? 'selected' : ''}}>{{ $animal->name }}</option>
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
                                <option value="Propietario">Propietario</option>
                                <option value="Representante del Propietario">Representante del Propietario</option>
                            </select>
                            @error('type_client')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Otro (Propietario / Poseedor de la Mascota)</label>
                            <input type="text" name="other_type_client" id="other_type_client" class="form-control">
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
        $('.client_id').select2(
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
            placeholder: "Seleccione una mascota",
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
        $('#client_id').on('change', function() {
            let client_id = $(this).val();
            if(client_id) {
                $.ajax({
                    url: '/get-animals/'+client_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#animal_id').empty();
                        $.each(data, function(key, value) {
                            $('#animal_id').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                });
            } else {
                $('#animal_id').empty();
            }
        });
    </script>
@stop
