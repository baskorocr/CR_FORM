@extends('template.auth')

@section('main-content')
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('home') }}" class="h1"><b>Register</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Create your account to get started.</p>

        <form action="{{ route('register') }}" method="POST">
          @csrf
          <!-- Name -->
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ request()->old('name') }}" placeholder="Full Name">
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <!-- Username -->
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-circle"></span>
              </div>
            </div>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ request()->old('username') }}" placeholder="Username">
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <!-- Email -->
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ request()->old('email') }}" placeholder="Email">
            @error('email')
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

          <!-- Confirm Password -->
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" class="form-control password" name="password_confirmation" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-eye-slash icon-toggle"></span>
              </div>
            </div>
          </div>

          <!-- Agree -->
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agree" name="agree" value="">
                <label for="agree">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
  
            <div class="col-4">
              <button type="submit" id="btn-register" class="btn btn-primary btn-block" disabled>Register</button>
            </div>
          </div>
        </form>

        <p class="mb-0">
          Already have an account? <a href="{{ route('login.form') }}">Log in</a> here.
        </p>
      </div>
    </div>
  </div>
@endsection