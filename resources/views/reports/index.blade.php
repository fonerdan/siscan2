@extends('adminlte::page')

@section('title', 'Reportes')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@section('content_header')
    <div class="bg-dark rounded p-3">
        <h4 class="d-inline">Reportes</h4>
    </div>
@stop

@section('content')
    <div class="card w-75 m-auto">
        <div class="card-body">
            <form id="reportForm" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Cliente</label>
                        <select name="client_id" id="client_id" class="form-control select2">
                            @foreach ($clients as $client)
                                <option></option>
                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }} - {{ "A". str_pad($client->code, 7, '0', STR_PAD_LEFT) }}
                                </option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Seleccionar Reporte</label>
                        <select name="report_type" id="report_type" class="form-control">
                            <option selected disabled>Seleccione una opción</option>
                            <option value="client">Reporte de Historias Clínicas</option>
                            <option value="contract">Reporte Contrato de Prestación</option>
                            <option value="euthanasia">Reporte de Eutanasias</option>
                            <option value="anesthesia_surgeries">Reporte de Cirugías con Anestesia</option>
                            <option value="sedation_anesthesia">Reporte de Anestesias con Sedación</option>
                            <option value="internments">Reporte de Internamientos</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Generar Reporte</button>
                </div>
            </form>
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

    <script>
        function submitForm() {
            let form = document.getElementById('reportForm');
            let selectedReport = document.getElementById('report_type').value;
            let clientId = document.getElementById('client_id').value;

            if (!clientId) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Debe seleccionar un cliente!',
                });
                return;
            }

            if (selectedReport === 'client') {
                form.action = "{{ route('reports_pdf_client') }}";
            } else if (selectedReport === 'contract') {
                form.action = "{{ route('reports_pdf_contract') }}";
            } else if (selectedReport === 'euthanasia') {
                form.action = "{{ route('reports_pdf_euthanasia') }}";
            } else if (selectedReport === 'anesthesia_surgeries') {
                form.action = "{{ route('reports_pdf_anesthesia_surgeries') }}";
            } else if (selectedReport === 'sedation_anesthesia') {
                form.action = "{{ route('reports_pdf_sedation_anesthesia') }}";
            } else if (selectedReport === 'internments') {
                form.action = "{{ route('reports_pdf_internments') }}";
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Debe seleccionar un reporte!',
                });
                return;
            }
            form.submit();

        }
    </script>
@stop
