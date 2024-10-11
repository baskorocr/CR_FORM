@extends('template.dashboard')

@section('breadcrumbs')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Supervisor</h1>
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
                <!-- Proposal -->
                <div class="col-lg-3 col-6">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
        
                        <div class="info-box-content">
                            <span class="info-box-text">Total CR</span>
                            <span class="info-box-number">{{ $count->proposal }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-gradient-warning"><i class="fas fa-clock"></i></span>
        
                        <div class="info-box-content">
                            <span class="info-box-text">Total CR Pending</span>
                            <span class="info-box-number">{{ $count->pending }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-success"><i class="fas fa-check-circle"></i></span>
        
                        <div class="info-box-content">
                            <span class="info-box-text">Total CR Approved</span>
                            <span class="info-box-number">{{ $count->approved }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-danger"><i class="fas fa-times"></i></span>
        
                        <div class="info-box-content">
                            <span class="info-box-text">Total CR Rejected</span>
                            <span class="info-box-number">{{ $count->rejected }}</span>
                        </div>
                    </div>
                </div>

                <!-- Supervisor -->
                <div class="col-lg-3 col-6">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-danger"><i class="fas fa-user-tie"></i></span>
        
                        <div class="info-box-content">
                            <span class="info-box-text">Supervisor</span>
                            <span class="info-box-number">{{ $count->supervisor }}</span>
                        </div>
                    </div>
                </div>

                <!-- Admin -->
                <div class="col-lg-3 col-6">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-info"><i class="fas fa-user-shield"></i></span>
        
                        <div class="info-box-content">
                            <span class="info-box-text">Admin</span>
                            <span class="info-box-number">{{ $count->admin }}</span>
                        </div>
                    </div>
                </div>

                <!-- User -->
                <div class="col-lg-3 col-6">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-primary"><i class="fas fa-user"></i></span>
        
                        <div class="info-box-content">
                            <span class="info-box-text">User</span>
                            <span class="info-box-number">{{ $count->user }}</span>
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="row">
                <section class="col-lg-7 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Total Data
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#account-chart" data-toggle="tab">Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#proposal-chart" data-toggle="tab">CR</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Account -->
                                <div class="chart tab-pane active" id="account-chart"
                                    style="position: relative; height: 300px;">
                                    <canvas id="account-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>

                                <!-- Morris chart - Proposal -->
                                <div class="chart tab-pane" id="proposal-chart" style="position: relative; height: 300px;">
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
        // Account Chart
        var ctxAccount = $('#account-chart-canvas').get(0).getContext('2d')

        var chartAccount = @json($chart1)

        var barData = {
            labels: chartAccount.labels,
            datasets: [
                {
                    label: chartAccount.datasets[0].label,
                    data: chartAccount.datasets[0].data,
                    backgroundColor: chartAccount.datasets[0].backgroundColor
                }
            ]
        }

        var barOptions = {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            responsive: true
        }

        var barChart = new Chart(ctxAccount, { 
            type: 'bar',
            data: barData,
            options: barOptions
        })

        // Proposal Chart
        var ctxProposal = $('#proposal-chart-canvas').get(0).getContext('2d')

        var chartProposal = @json($chart2)

        var donutData = {
            labels: chartProposal.labels,
            datasets: [
                {
                    label: chartProposal.datasets[0].label,
                    data: chartProposal.datasets[0].data,
                    backgroundColor: chartProposal.datasets[0].backgroundColor
                }
            ]
        }

        var donutOptions = {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            responsive: true
        }

        var donutChart = new Chart(ctxProposal, { 
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    </script>
@endsection