@extends('template.auth')

@section('main-content')
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('home') }}" class="h1"><b>FAMS</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
        <form action="{{ route('password.email') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
          </div>
        </form>
        <p class="mt-3 mb-1">
          <a href="{{ route('login.form') }}">Login</a>
        </p>
      </div>
    </div>
  </div>
@endsection