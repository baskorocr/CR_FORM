@extends('template.auth')

@section('main-content')
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('home') }}" class="h1"><b>FAMS</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
        <form action="{{ route('password.update') }}" method="POST">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
            @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" class="form-control password @error('password') is-invalid @enderror" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-eye-slash icon-toggle"></span>
              </div>
            </div>
            @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" class="form-control password" name="password_confirmation" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-eye-slash icon-toggle"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
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