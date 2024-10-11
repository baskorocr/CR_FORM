@extends('template.auth')

@section('main-content')
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <p class="h1"><b>Login</b></p>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Log in to your account to continue.</p>

        <form action="{{ route('login') }}" method="POST">
          @csrf
          <!-- Credentials -->
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-circle"></span>
              </div>
            </div>
            <input type="text" class="form-control @error('credentials') is-invalid @enderror" name="credentials" placeholder="Username or Email" value="{{ request()->old('credentials') }}">
            @error('credentials')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <!-- Password -->
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

          <!-- Remember Me -->
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

        <p class="mb-1">
          <a href="{{ route('password.email') }}">Forget Password</a>
        </p>
        <p class="mb-0">
          Don't have an account? <a href="{{ route('register.form') }}">Register</a> here.
        </p>
      </div>
    </div>
  </div>
@endsection