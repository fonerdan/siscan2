@extends('adminlte::page')

@section('title', 'Mascotas')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Mascotas</h4>
        <a href="{{ route('animals.create') }}" class="btn btn-primary float-right">Registrar Mascota</a>
        <a href="{{ route('animals_pdf')}}" class="float-right btn btn-danger mr-1" target="_blank"><i class="fas fa-file-pdf"></i> Lista de Clientes</a>
    </div>
    <table id="data" class="table table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-dark">
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Cliente</th>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Género</th>
                <th>Pelaje</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animals as $index => $animal)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $animal->user->name }}</td>
                <td>{{ $animal->client->name }}</td>
                <td>{{ $animal->name }}</td>
                <td>{{ $animal->specie }}</td>
                <td>{{ $animal->race }}</td>
                <td>{{ $animal->gender }}</td>
                <td>{{ $animal->fur }}</td>
                <td>
                    <img src="{{ asset('./animal_images/'.$animal->photo) }}" class="img-fluid" width="80">
                </td>
                <td class="d-flex">
                    <a href="{{ route('history_animal', $animal)}}" class="btn btn-danger mr-1" target="_blank"><i class="fas fa-file-pdf"></i></a>
                    <a href="{{ route('animals.show', $animal) }}" class="btn btn-info mr-1"><i class=" fas fa-eye"></i></a>
                    <a href="{{ route('animals.edit', $animal) }}" class="btn btn-warning mr-1"><i class="fas fa-pen"></i></a>
                    @can('animals.destroy')
                        <form action="{{ route('animals.destroy', $animal) }}" method="POST" class="form-delete">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@stop
