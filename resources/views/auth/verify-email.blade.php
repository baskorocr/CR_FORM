@extends('template.auth')

@section('main-content')
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('home') }}" class="h1"><b>Verify Email</b></a>
      </div>
      <div class="card-body">
        <h5 class="login-box-msg">Verification Email</h5>

        <p class="text-center">Please check your email and click the verification link to complete the process.</p>

        <p class="mb-1">
          <form class="text-center" action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Request new link</button>
          </form>
        </p>
      </div>
    </div>
  </div>
@endsection