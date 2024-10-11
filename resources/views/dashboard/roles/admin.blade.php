@extends('template.dashboard')

@section('breadcrumbs')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-7 connectedSortable">
                <!-- Chart Proposal-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                CR (month)
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#proposal-chart" data-toggle="tab">CR</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Proposal -->
                                <div class="chart tab-pane active" id="proposal-chart" style="position: relative; height: 300px;">
                                    <canvas id="proposal-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="col-lg-5 connectedSortable">
                    <!-- Calendar -->
                    <div class="card bg-gradient-light">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <div class="card-tools">                    
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // Total Proposal Chart
        var ctx = $('#proposal-chart-canvas').get(0).getContext('2d')

        var chart = @json($chart)

        var data = {
            labels: chart.labels,
            datasets: [
                {
                    label: chart.datasets[0].label,
                    data: chart.datasets[0].data,
                    backgroundColor: chart.datasets[0].backgroundColor
                }
            ]
        }
        var options = {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            responsive: true
        }

        var donutChart = new Chart(ctx, {   
            type: 'doughnut',
            data: data,
            options: options
        })
    </script>
@endsection