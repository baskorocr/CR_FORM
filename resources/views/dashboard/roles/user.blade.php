@extends('template.dashboard')

@section('breadcrumbs')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
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
                    <!-- Callout -->
                    <div class="callout callout-info">
                        <h5>Dashboard DPM</h5>

                        <p>Welcome to your dashboard! <br/> Here you can manage your account and access all features.</p>
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