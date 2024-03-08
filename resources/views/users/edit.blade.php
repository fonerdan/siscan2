@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@stop

@section('content')
<div class="p-3">
    <div class="card m-auto w-75">
        <div class="card-header bg-dark">
            <h4>Editar Usuario</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Carnet de Identidad</label>
                            <input type="number" name="ci" id="ci" class="form-control" value="{{$user->ci}}">
                            @error('ci')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="number" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" disabled selected>Seleccione un rol</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->roles->count() > 0 && $user->roles[0]->id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('users.index') }}" class="btn btn-warning text-bold">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
