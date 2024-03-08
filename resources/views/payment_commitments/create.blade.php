@extends('adminlte::page')

@section('title', 'Registrar Compromiso de Pago')

@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card w-100 m-auto">
        <div class="card-header bg-dark">
            <h4>Registrar Compromiso de Pago</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('payment_commitments.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="required">Cliente</label>
                            <select name="client_id" id="client_id" class="form-control select2">
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

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="required">Fecha de Pago</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{old('date')}}">
                            @error('date')
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
@stop
