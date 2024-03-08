@extends('adminlte::page')

@section('title', 'Registrar Contrato de Prestación de Servicios')

@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card w-75 m-auto">
        <div class="card-header bg-dark">
            <h4>Registrar Contrato de Prestación de Servicios</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('service_provision_contracts.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Cliente</label>
                            <select name="client_id" id="client_id" class="form-control client_id">
                                @foreach ($clients as $client)
                                    <option></option>
                                    <option value="{{ $client->id }}" {{old('client_id') == $client->id ? 'selected' : ''}}>{{ $client->name }}</option>
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
                                    <option value="{{ $animal->id }}" {{old('animal_id') == $animal->id ? 'selected' : ''}}>{{ $animal->name }}</option>
                                @endforeach
                            </select>
                            @error('animal_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Edad Aproximada</label>
                            <input type="text" name="aproximated_age" id="aproximated_age" class="form-control" value="{{old('aproximated_age')}}">
                            @error('aproximated_age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Color</label>
                            <input type="text" name="color" id="color" class="form-control" value="{{old('color')}}">
                            @error('color')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="required">Fecha de Inicio</label>
                            <input type="date" name="date_start" id="date_start" class="form-control" value="{{old('date_start')}}">
                            @error('date_start')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="required">Fecha de Fin</label>
                            <input type="date" name="date_end" id="date_end" class="form-control" value="{{old('date_end')}}">
                            @error('date_end')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="required">Monto</label>
                            <input type="number" name="amount" id="amount" class="form-control" value="{{old('amount')}}" step="any">
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('payment_commitments.index') }}" class="btn btn-warning text-bold">Cancelar</a>
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
