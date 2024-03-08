@extends('adminlte::page')

@section('title', 'Registrar Ficha Clinica')

@section('plugins.Select2', true)

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@stop

@section('content')
<div class="p-3">
    <div class="card m-auto w-75">
        <div class="card-header bg-dark">
            <h4>Registrar Ficha Clinica</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Cliente</label>
                            <select name="client_id" id="client_id" class="form-control select2">
                                @foreach ($clients as $client)
                                    <option></option>
                                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
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
                            <label class="required">Especie</label>
                            <select name="specie" id="specie" class="form-control">
                                <option selected disabled>Seleccione una opción</option>
                                <option value="Canino" {{ old('specie') == 'Canino' ? 'selected' : '' }}>Canino</option>
                                <option value="Felino" {{ old('specie') == 'Felino' ? 'selected' : '' }}>Felino</option>
                                <option value="Ave" {{ old('specie') == 'Ave' ? 'selected' : '' }}>Ave</option>
                                <option value="Reptil" {{ old('specie') == 'Reptil' ? 'selected' : '' }}>Reptil</option>
                                <option value="Roedor" {{ old('specie') == 'Roedor' ? 'selected' : '' }}>Roedor</option>
                                <option value="Anfibio" {{ old('specie') == 'Anfibio' ? 'selected' : '' }}>Anfibio</option>
                                <option value="Pez" {{ old('specie') == 'Pez' ? 'selected' : '' }}>Pez</option>
                                <option value="Mamifero" {{ old('specie') == 'Mamifero' ? 'selected' : '' }}>Mamifero</option>
                                <option value="Otro" {{ old('specie') == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Raza</label>
                            <input type="text" name="race" id="race" class="form-control" value="{{old('race')}}"">
                            @error('race')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Género</label><br>
                            Macho
                            <input type="radio" name="gender" id="gender_macho" value="Macho" {{ old('gender') == 'Macho' ? 'checked' : '' }}>
                            Hembra
                            <input type="radio" name="gender" id="gender_hembra" value="Hembra" {{ old('gender') == 'Hembra' ? 'checked' : '' }}>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Pelaje</label>
                            <input type="text" name="fur" id="fur" class="form-control" value="{{old('fur')}}">
                            @error('fur')
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
                    <a href="{{ route('animals.index') }}" class="btn btn-warning text-bold">Cancelar</a>
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
