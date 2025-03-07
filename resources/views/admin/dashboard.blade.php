@extends('admin.layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{asset('assets/plugins/chart.js/Chart.min.css')}}">
@endpush

@section('content')

<div class="row">
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                <a href="javascript:void(0);" id="toggle_btn">
                    <img src="{{ asset('assets/img/donate.png') }}" alt="insumo" width="40" height="60" style="border: 2px solid #003366; border-radius: 50%;">
                </a>

                    <div class="dash-count">
                    @isset($today_insumo)
                        <h3>{{ $today_insumo }}</h3>
                        @else
                           <h6><p>No hay datos para mostrar.</p></h6> 
                    @endisset
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h6 class="text-muted">insumo de Hoy</h6>
                </div>
            </div>
        </div>
    </div>
    <!--- fin de primera card... --->
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                <a href="javascript:void(0);" id="toggle_btn">
                    <img src="{{ asset('assets/img/labels.png') }}" alt="insumo" width="40" height="60" style="border: 2px solid #003366; border-radius: 50%;">
                </a>

                    <div class="dash-count">
                    @isset($total_categories)
                            <h3>{{ $total_categories }}</h3>
                        @else
                        <h6><p>No hay datos para mostrar.</p></h6> 
                        @endisset

                    </div>
                </div>
                <div class="dash-widget-info">
                    <h6 class="text-muted">Categorías Disponibles</h6>
                </div>
            </div>
        </div>
    </div>
    <!--- fin de segunda card... --->

    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                <a href="javascript:void(0);" id="toggle_btn">
                    <img src="{{ asset('assets/img/medicina.png') }}" alt="insumo" width="40" height="60" style="border: 2px solid #003366; border-radius: 50%;">
                </a>

                    <div class="dash-count">
                    @isset($total_expired_medicines)
                            <h3>{{ $total_expired_medicines }}</h3>
                        @else
                        <h6><p>No hay datos para mostrar.</p></h6> 
                        @endisset

                    </div>
                </div>
                <div class="dash-widget-info">
                    <h6 class="text-muted">Medicinas Expiradas</h6>
                </div>
            </div>
        </div>
    </div>
    <!--- fin de tercera card... --->
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                <a href="javascript:void(0);" id="toggle_btn">
                    <img src="{{ asset('assets/img/users.png') }}" alt="insumo" width="40" height="60" style="border: 2px solid #003366; border-radius: 50%;">
                </a>

                    <div class="dash-count">
                    @isset($total_users)
                            <h3>{{ $total_users }}</h3>
                        @else
                        <h6><p>No hay datos para mostrar.</p></h6> 
                        @endisset

                    </div>
                </div>
                <div class="dash-widget-info">
                    <h6 class="text-muted">Usuarios del Sistema</h6>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--- fin de cuarta card... --->
<!-- Pie Chart -->
<div class="card card-chart">
    <div class="card-header">
        <h4 class="card-title text-center">Reporte Gráfico</h4>
    </div>
    <div class="card-body">
        <canvas id="pieChart" width="400" height="200"></canvas>
    </div>
</div>

@endsection

@push('page-js')
<script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<script>
 $(document).ready(function() {
    // Datos para el gráfico
    var medicinasDonadas = {{ $medicinasDonadas ?? 0 }};
    var equipmentDonados = {{ $equipmentDonados ?? 0 }};
    var beneficiariosAtendidos = {{ $beneficiariosAtendidos ?? 0 }};
    var solicitudesRealizadas = {{ $solicitudesRealizadas ?? 0 }};

    // Configuración del gráfico
    var ctx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Medicinas Donadas', 'Equipos Médicos Donados', 'Beneficiarios Atendidos', 'Solicitudes Realizadas'],
            datasets: [{
                label: 'Reporte Gráfico',
                data: [medicinasDonadas, equipmentDonados, beneficiariosAtendidos, solicitudesRealizadas],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Reporte Gráfico'
            }
        }
    });
});

</script>
@endpush
