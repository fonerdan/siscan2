@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="bg-dark p-3">Panel de Control</h1>
@stop

@section('plugins.Chartjs', true)

@section('content')
    <input type="hidden" value="{{$anesthesiaSurgeries}}" id="anesthesiaSurgeries">
    <input type="hidden" value="{{$clinicalRecords}}" id="clinicalRecords">
    <input type="hidden" value="{{$euthanasias}}" id="euthanasias">
    <input type="hidden" value="{{$internments}}" id="internments">
    <input type="hidden" value="{{$sedationAnesthesias}}" id="sedationAnesthesias">
    <input type="hidden" value="{{$serviceProvisionContracts}}" id="serviceProvisionContracts">
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Gráfico General
                    </h3>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="pieChart"
                        style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%; display: block; width: 400px;"
                        width="476" height="450" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Gráfico General por género
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center bg-teal">
                            Cirugías de Anestesia
                        </div>
                        <div class="card-body">
                            <canvas id="pieCharts" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 150px;"></canvas>
                            <input type="hidden" value="{{$anesthesiaSurgeriesMales}}" id="malesAnestheriasSurgeries">
                            <input type="hidden" value="{{$anesthesiaSurgeriesFemales}}" id="femalesAnestheriasSurgeries">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="text-center bg-teal">
                            Fichas Clínicas
                        </div>
                        <div class="card-body">
                            <canvas id="pieCharts1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 150px;"></canvas>
                            <input type="hidden" value="{{$clinicalRecordsMales}}" id="clinicalRecordsMales">
                            <input type="hidden" value="{{$clinicalRecordsFemales}}" id="clinicalRecordsFemales">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="text-center bg-teal">
                            Eutanasias
                        </div>
                        <div class="card-body">
                            <canvas id="pieCharts2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 150px;"></canvas>
                            <input type="hidden" value="{{$euthanasiasMales}}" id="euthanasiasMales">
                            <input type="hidden" value="{{$euthanasiasFemales}}" id="euthanasiasFemales">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="text-center bg-teal">
                            Internamientos
                        </div>
                        <div class="card-body">
                            <canvas id="pieCharts3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 150px;"></canvas>
                            <input type="hidden" value="{{$internmentsMales}}" id="internmentsMales">
                            <input type="hidden" value="{{$internmentsFemales}}" id="internmentsFemales">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="text-center bg-teal">
                            Sedaciones
                        </div>
                        <div class="card-body">
                            <canvas id="pieCharts4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 150px;"></canvas>
                            <input type="hidden" value="{{$sedationAnesthesiasMales}}" id="sedationAnesthesiasMales">
                            <input type="hidden" value="{{$sedationAnesthesiasFemales}}" id="sedationAnesthesiasFemales">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center bg-teal">
                            Contratos de Prestación de Servicios
                        </div>
                        <div class="card-body">
                            <canvas id="pieCharts5" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 150px;"></canvas>
                            <input type="hidden" value="{{$serviceProvisionContractsMales}}" id="serviceProvisionContractsMales">
                            <input type="hidden" value="{{$serviceProvisionContractsFemales}}" id="serviceProvisionContractsFemales">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function() {
            let anesthesiaSurgeries = $('#anesthesiaSurgeries').val();
            let clinicalRecords = $('#clinicalRecords').val();
            let euthanasias = $('#euthanasias').val();
            let internments = $('#internments').val();
            let sedationAnesthesias = $('#sedationAnesthesias').val();
            let serviceProvisionContracts = $('#serviceProvisionContracts').val();

            let donutChartCanvas = $('#pieChart').get(0).getContext('2d')
            let pieData = {
                labels: [
                    'Cirugías de Anestesia',
                    'Fichas Clínicas',
                    'Eutanasias',
                    'Internamientos',
                    'Sedaciones',
                    'Contratos de Prestación de Servicios'
                ],
                datasets: [{
                    data: [
                        anesthesiaSurgeries,
                        clinicalRecords,
                        euthanasias,
                        internments,
                        sedationAnesthesias,
                        serviceProvisionContracts
                    ],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }
            let donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }

            new Chart(pieChart, {
                type: 'pie',
                data: pieData,
                options: donutOptions
            })
        })
    </script>
    <script>
        $(function() {
            let malesAnestheriasSurgeries = $('#malesAnestheriasSurgeries').val();
            let femalesAnestheriasSurgeries = $('#femalesAnestheriasSurgeries').val();

            let donutChartCanvas = $('#pieCharts').get(0).getContext('2d')
            let pieDatas = {
                labels: [
                    'Machos',
                    'Hembras'
                ],
                datasets: [{
                    data: [
                        malesAnestheriasSurgeries,
                        femalesAnestheriasSurgeries
                    ],
                    backgroundColor: ['#f39c12', '#00c0ef'],
                }]
            }
            let donutOptionss = {
                maintainAspectRatio: false,
                responsive: true,
            }

            new Chart(pieCharts, {
                type: 'pie',
                data: pieDatas,
                options: donutOptionss
            })
        })
    </script>

    <script>
        $(function() {
            let clinicalRecordsMales = $('#clinicalRecordsMales').val();
            let clinicalRecordsFemales = $('#clinicalRecordsFemales').val();

            let donutChartCanvas = $('#pieCharts1').get(0).getContext('2d')
            let pieDatas = {
                labels: [
                    'Machos',
                    'Hembras'
                ],
                datasets: [{
                    data: [
                        clinicalRecordsMales,
                        clinicalRecordsFemales
                    ],
                    backgroundColor: ['#f39c12', '#00c0ef'],
                }]
            }
            let donutOptionss = {
                maintainAspectRatio: false,
                responsive: true,
            }

            new Chart(pieCharts1, {
                type: 'pie',
                data: pieDatas,
                options: donutOptionss
            })
        })
    </script>

    <script>
        $(function() {
            let euthanasiasMales = $('#euthanasiasMales').val();
            let euthanasiasFemales = $('#euthanasiasFemales').val();

            let donutChartCanvas = $('#pieCharts2').get(0).getContext('2d')
            let pieDatas = {
                labels: [
                    'Machos',
                    'Hembras'
                ],
                datasets: [{
                    data: [
                        euthanasiasMales,
                        euthanasiasFemales
                    ],
                    backgroundColor: ['#f39c12', '#00c0ef'],
                }]
            }
            let donutOptionss = {
                maintainAspectRatio: false,
                responsive: true,
            }

            new Chart(pieCharts2, {
                type: 'pie',
                data: pieDatas,
                options: donutOptionss
            })
        })
    </script>

    <script>
        $(function() {
            let internmentsMales = $('#internmentsMales').val();
            let internmentsFemales = $('#internmentsFemales').val();

            let donutChartCanvas = $('#pieCharts3').get(0).getContext('2d')
            let pieDatas = {
                labels: [
                    'Machos',
                    'Hembras'
                ],
                datasets: [{
                    data: [
                        internmentsMales,
                        internmentsFemales
                    ],
                    backgroundColor: ['#f39c12', '#00c0ef'],
                }]
            }
            let donutOptionss = {
                maintainAspectRatio: false,
                responsive: true,
            }

            new Chart(pieCharts3, {
                type: 'pie',
                data: pieDatas,
                options: donutOptionss
            })
        })
    </script>

    <script>
        $(function() {
            let sedationAnesthesiasMales = $('#sedationAnesthesiasMales').val();
            let sedationAnesthesiasFemales = $('#sedationAnesthesiasFemales').val();

            let donutChartCanvas = $('#pieCharts4').get(0).getContext('2d')
            let pieDatas = {
                labels: [
                    'Machos',
                    'Hembras'
                ],
                datasets: [{
                    data: [
                        sedationAnesthesiasMales,
                        sedationAnesthesiasFemales
                    ],
                    backgroundColor: ['#f39c12', '#00c0ef'],
                }]
            }
            let donutOptionss = {
                maintainAspectRatio: false,
                responsive: true,
            }

            new Chart(pieCharts4, {
                type: 'pie',
                data: pieDatas,
                options: donutOptionss
            })
        })
    </script>

    <script>
        $(function() {
            let serviceProvisionContractsMales = $('#serviceProvisionContractsMales').val();
            let serviceProvisionContractsFemales = $('#serviceProvisionContractsFemales').val();

            let donutChartCanvas = $('#pieCharts5').get(0).getContext('2d')
            let pieDatas = {
                labels: [
                    'Machos',
                    'Hembras'
                ],
                datasets: [{
                    data: [
                        serviceProvisionContractsMales,
                        serviceProvisionContractsFemales
                    ],
                    backgroundColor: ['#f39c12', '#00c0ef'],
                }]
            }
            let donutOptionss = {
                maintainAspectRatio: false,
                responsive: true,
            }

            new Chart(pieCharts5, {
                type: 'pie',
                data: pieDatas,
                options: donutOptionss
            })
        })
    </script>
@stop
