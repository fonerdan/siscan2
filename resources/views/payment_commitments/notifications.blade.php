@extends('adminlte::page')

@section('title', 'Agenda')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="bg-dark p-2 rounded">
        <h4>Agenda</h4>
    </div>
@stop

@section('content')
@if ($notifications->isEmpty())
    <div class="alert alert-warning text-center" role="alert">
        No hay notificaciones aún.
    </div>
@endif
    <div class=" d-flex flex-wrap ">
    @foreach ($notifications as $data)
        <div class=" col-lg-3 col-12 mb-3">
            <div class="card @if($data->read_at === null) bg-warning @else bg-dark @endif">
                <div class="card-body">
                    <form action="{{route('checkNotification', $data)}}" method="POST">
                        @csrf
                        <div>
                            <i class="fas fa-user-alt"></i>
                            {{ $data->data['client']}}
                        </div>

                        <div>
                            <i class="fas fa-money-bill"></i>
                            {{ $data->data['amount']}} Bs.
                        </div>

                        <div>
                            <i class="fas fa-calendar"></i>
                            {{ $data->data['date']}}
                        </div>
                        <div class="mt-3">
                            @if($data->read_at)
                                <span class="float-left text-white-50">
                                    <i class="fas fa-check-circle"></i> Leído
                                </span>
                            @else
                                <span class="float-left">
                                    <button class="btn btn-primary" type="submit"> <i class="fas fa-check-circle"></i> Marcar como leído</button>
                                </span>
                            @endif

                            <span class="text-right d-block ">
                                {{ $data->created_at->diffForHumans()}}
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

@stop
