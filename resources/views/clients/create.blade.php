@extends('adminlte::page')

@section('title', 'Registrar Cliente')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@stop

@section('content')
<div class="p-3">
    <div class="card m-auto w-75">
        <div class="card-header bg-dark">
            <h4>Registrar Cliente</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="required">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Carnet de Identidad</label>
                            <input type="number" name="ci" id="ci" class="form-control" value="{{old('ci')}}">
                            @error('ci')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Expedido</label>
                            <input type="text" name="expedition" id="expedition" class="form-control" value="{{old('expedition')}}">
                            @error('expedition')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="home" id="home" class="form-control" value="{{old('home')}}">
                            @error('home')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Calle</label>
                            <input type="text" name="street" id="street" class="form-control" value="{{old('street')}}">
                            @error('street')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Número</label>
                            <input type="number" name="number" id="number" class="form-control" value="{{old('number')}}">
                            @error('number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Teléfono</label>
                            <input type="number" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono de referencia</label>
                            <input type="number" name="reference_phone" id="reference_phone" class="form-control" value="{{old('reference_phone')}}">
                            @error('reference_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="required">Imagen</label>
                            <input type="file" name="photo" class="dropify">
                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('clients.index') }}" class="btn btn-warning text-bold">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Registrar</button>
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
