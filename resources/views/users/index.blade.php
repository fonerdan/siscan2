@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Usuarios</h4>
        <a href="{{ route('users.create') }}" class="btn btn-primary float-right">Registrar Usuario</a>
    </div>
    <table id="data" class="table table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Carnet de Identidad</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    @if ($user->ci == null)
                        <span class="badge badge-warning">Sin CI</span>
                    @endif
                    {{ $user->ci }}
                </td>
                <td>
                    @if ($user->phone == null)
                        <span class="badge badge-warning">Sin Teléfono</span>
                    @endif
                    {{ $user->phone }}
                </td>
                <td>{{ $user->email}}</td>
                <td>
                    @if($user->roles->count() > 0)
                        <span class="bg-primary rounded p-1">{{ $user->roles[0]->name }}</span>
                    @else
                        Sin Rol Asignado
                    @endif
                </td>
                <td>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
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
                text: "Este usuario será eliminado permanentemente",
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
