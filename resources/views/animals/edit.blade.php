@extends('adminlte::page')

@section('title', 'Editar Mascota')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@stop

@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto w-75">
        <div class="card-header bg-dark">
            <h4>Registrar Mascota</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('animals.update', $animal) }}" method="POST" enctype="multipart/form-data">
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
                            <label>Nombre :</label>
                            <input type="text" name="name" value="{{$animal->name}}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Especie</label>
                            <select name="specie" id="specie" class="form-control">
                                <option selected disabled>Seleccione una opción</option>
                                <option value="Canino" {{ $animal->specie == 'Canino' ? 'selected' : '' }}>Canino</option>
                                <option value="Felino" {{ $animal->specie == 'Felino' ? 'selected' : '' }}>Felino</option>
                                <option value="Ave" {{ $animal->specie == 'Ave' ? 'selected' : '' }}>Ave</option>
                                <option value="Reptil" {{ $animal->specie == 'Reptil' ? 'selected' : '' }}>Reptil</option>
                                <option value="Roedor" {{ $animal->specie == 'Roedor' ? 'selected' : '' }}>Roedor</option>
                                <option value="Anfibio" {{ $animal->specie == 'Anfibio' ? 'selected' : '' }}>Anfibio</option>
                                <option value="Pez" {{ $animal->specie == 'Pez' ? 'selected' : '' }}>Pez</option>
                                <option value="Mamifero" {{ $animal->specie == 'Mamifero' ? 'selected' : '' }}>Mamifero</option>
                                <option value="Otro" {{ $animal->specie == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Raza</label>
                            <input type="text" name="race" id="race" class="form-control" value="{{$animal->race}}">
                            @error('race')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Género</label><br>
                            Macho
                            <input type="radio" name="gender" id="gender" value="Macho" {{$animal->gender == "Macho" ? 'checked' : ''}}>
                            Hembra
                            <input type="radio" name="gender" id="gender" value="Hembra" {{$animal->gender == "Hembra" ? 'checked' : ''}}>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pelaje</label>
                            <input type="text" name="fur" id="fur" class="form-control" value="{{$animal->fur}}">
                            @error('fur')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Imagen :</label>
                            <input type="file" name="photo" class="dropify" data-default-file="{{ asset('animal_images/'.$animal->photo) }}">
                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
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
