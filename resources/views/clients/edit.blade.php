@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@stop

@section('content')
<div class="p-3">
    <div class="card m-auto w-75">
        <div class="card-header bg-dark">
            <h4>Editar Cliente</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nombre </label>
                            <input type="text" name="name" value="{{$client->name}}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Carnet de Identidad </label>
                            <input type="number" name="ci" value="{{$client->ci}}" class="form-control">
                            @error('ci')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Expedido</label>
                            <input type="text" name="expedition" id="expedition" class="form-control" value="{{$client->expedition}}">
                            @error('expedition')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="home" id="home" class="form-control" value="{{$client->home}}">
                            @error('home')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Calle</label>
                            <input type="text" name="street" id="street" class="form-control" value="{{$client->street}}">
                            @error('street')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Número</label>
                            <input type="number" name="number" id="number" class="form-control" value="{{$client->number}}">
                            @error('number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono </label>
                            <input type="number" name="phone" value="{{$client->phone}}" class="form-control">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono de referencia </label>
                            <input type="number" name="reference_phone" value="{{$client->reference_phone}}" class="form-control">
                            @error('reference_phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" name="photo" class="dropify" data-default-file="{{ asset('images/' . $client->photo) }}">
                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('clients.index') }}" class="btn btn-warning text-bold">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify(
            {
                messages: {
                    default: 'Arrastra y suelta una imagen aquí o haz clic',
                    replace: 'Arrastra y suelta o haz clic para reemplazar',
                    remove:  'Eliminar',
                    error:   'Ooops, algo salió mal.'
                }
            }
        );
    </script>
@stop
