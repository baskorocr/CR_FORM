@extends('template.dashboard')

@section('breadcrumbs')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Account</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Account</li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New Account</h3>
            </div>
            <form action="{{ route('account.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <!-- Name -->
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ request()->old('name') }}" placeholder="ex: Jana Dev">
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
  
                <!-- Username -->
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ request()->old('username') }}" placeholder="ex: janadev">
                  @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
  
                <!-- Email -->
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ request()->old('email') }}" placeholder="ex: janadev@example.com">
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- Departement -->
                <div class="form-group">
                  <label for="departement">Departement</label>
                  <select class="form-control @error('departement') is-invalid @enderror" name="departement" id="departement">
                    <option value="">Pilih Departement</option>
                    <option value="IT">IT</option>
                    <option value="PPIC">PPIC</option>
                    <option value="MARKETING">MARKETING</option>
                    <option value="ACCOUNTING">ACCOUNTING</option>
                    <option value="FINANCE">FINANCE</option>
                    <option value="ENGINEERING">ENGINEERING</option>
                    <option value="MAINTENANCE">MAINTENANCE</option>
                  </select>
                  @error('departement')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                      
                <!-- Role -->
                <div class="form-group">
                  <label for="role">Role</label>
                  <select name="role_id" id="role" class="form-control @error('role_id') is-invalid @enderror">
                    <option value=""> -- Select Role -- </option>
                    @foreach ($roles as $role)
                      <option value="{{$role->id}}">{{ $role->name }}</option>
                    @endforeach
                  </select>
                  @error('role_id')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
  
                <!-- Password -->
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password">
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                      
                <!-- Password Confirmation -->
                <div class="form-group">
                  <label for="password">Retype Password</label>
                  <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Enter Password Again">
                </div>
              </div>
              
              <div class="card-footer">
                <a href="{{ route('account.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection