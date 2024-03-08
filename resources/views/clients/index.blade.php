@extends('adminlte::page')

@section('title', 'Clientes')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Clientes</h4>
        <a href="{{ route('clients.create') }}" class="btn btn-primary float-right">Registrar Cliente</a>
    </div>
    <table id="data" class="table table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-dark">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Carnet de Identidad</th>
                <th>Teléfono</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($clients as $index => $client)
            <tr>
                <td>{{ "A". str_pad($client->code, 7, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->ci}}</td>
                <td>{{ $client->phone }}</td>
                <td>
                    <img src="{{asset('images/'.$client->photo)}}" alt="client_photo" class="img-fluid" width="50">
                </td>
                <td class="d-flex">
                    <a href="{{ route('clients.show', $client) }}" class="btn btn-info mr-1"><i class=" fas fa-eye"></i></a>
                    <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning mr-1"><i class="fas fa-pen"></i></a>
                    @can('clients.destroy')
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="form-delete">
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
                text: "Este cliente será eliminado permanentemente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@stop
