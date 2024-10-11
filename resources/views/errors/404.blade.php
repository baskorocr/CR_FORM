@extends('template.dashboard')

@section('breadcrumbs')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>404 | FAMS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">404</li>
                </ol>
            </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"> 404 | FAMS</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="{{ route('dashboard') }}">return to dashboard</a>.
                </p>
            </div>
        </div>
  </section>
@endsection