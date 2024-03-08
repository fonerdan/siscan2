@extends('adminlte::page')

@section('title', 'Actas de Interamiento')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Actas de Internamiento</h4>
        <div class="float-right">
            <a href="{{ route('internments.create') }}" class="btn btn-primary mb-2 float-md-right">Registrar Internamiento</a>
            <a href="{{ route('pdf_all_internments') }}" class="btn btn-info mb-2 mr-2 float-md-right" target="_blank">
                <i class="fas fa-file-pdf"></i> Actas de Internamiento
            </a>
            <form action="export_internments" method="POST" class="form-inline">
                @csrf
                <div class="form-group mr-2">
                    <label for="initial_date" class="mr-2">Desde:</label>
                    <input type="date" name="initial_date" id="initial_date" class="form-control">
                </div>
                <div class="form-group mr-2">
                    <label for="final_date" class="mr-2">Hasta:</label>
                    <input type="date" name="final_date" id="final_date" class="form-control">
                </div>
                <button type="submit" class="btn btn-success mr-2">
                    <i class="fas fa-calendar"></i> Consultar
                </button>
            </form>
        </div>
    </div>
    <table id="data" class="table table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Doctor</th>
                <th>Comprobante</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($internments as $index => $internment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $internment->client->name }}</td>
                <td>{{ $internment->animal->name }}</td>
                <td>{{ $internment->doctor }}</td>
                <td>
                    @if ($internment->photo == null)
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$internment->id}}">
                            <i class="fas fa-file-image"></i>
                        </button>
                    @else
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$internment->id}}">
                            <i class="fas fa-file-image"></i>
                        </button>
                    @endif
                    <div class="modal fade" id="exampleModal{{$internment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">COMPROBANTE</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                @if ($internment->photo == null)
                                    <div class="modal-body">
                                        <p class="text-center p-3 rounded">No se cargo ningún comprobante aún.</p>
                                    </div>
                                @else
                                    <div class="modal-body">
                                        <img src="{{ asset('internments_images/' . $internment->photo) }}" alt="Comprobante" width="100%">
                                    </div>
                                @endif

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>{{ $internment->created_at->format('d-m-Y H:i:s') }}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <form action="{{ route('upload_image_internment', $internment)}}" method="POST" enctype="multipart/form-data" class="mr-2">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $internment->id }}">
                            <input type="file" name="photo" id="photo" required>
                            <button type="submit" class="btn btn-info"><i class="fas fa-cloud-upload-alt"></i></button>
                        </form>
                        <a href="{{ route('internments', $internment)}}" class="btn btn-primary mr-1" target="_blank"><i class="fas fa-file-pdf"></i></a>

                        @can('internments.edit')
                        <a href="{{ route('internments.edit', $internment) }}" class="btn btn-warning mr-1"><i class="fas fa-pen"></i></a>
                        @endcan
                        @can('internments.destroy')
                        <form action="{{ route('internments.destroy', $internment) }}" method="POST" class="form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        @endcan
                    </div>
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
