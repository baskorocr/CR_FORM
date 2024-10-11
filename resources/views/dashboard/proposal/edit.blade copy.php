@extends('template.dashboard')

@section('breadcrumbs')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>FORM CR</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">CR</li>
            <li class="breadcrumb-item active">Edit</li>
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
              <h3 class="card-title">Edit CR</h3>
            </div>
            <form action="{{ route('proposal.update', $proposal->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">

                  <!-- User Request -->
                <div class="form-group">
                  <label for="user_request">User / Request</label>
                  <textarea class="form-control @error('user_request') is-invalid @enderror" name="user_request" rows="3" placeholder="Enter Name">{{ request()->old('user_request') }}</textarea>
                  @error('user_request')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- User Status -->
                <div class="form-group">
                  <label for="user_status">User Status</label>
                  <textarea class="form-control @error('user_status') is-invalid @enderror" name="user_status" rows="3" placeholder="Enter Status">{{ request()->old('user_status') }}</textarea>
                  @error('user_status')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- Departement -->
                <div class="form-group">
                  <label for="departement">Departement</label>
                  <textarea class="form-control @error('departement') is-invalid @enderror" name="departement" rows="3" placeholder="Enter Departement">{{ request()->old('departement') }}</textarea>
                  @error('departement')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- Phone -->
                <div class="form-group">
                  <label for="ext_phone">Ext / Phone</label>
                  <textarea class="form-control @error('ext_phone') is-invalid @enderror" name="ext_phone" rows="3" placeholder="Enter Phone">{{ request()->old('ext_phone') }}</textarea>
                  @error('ext_phone')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- Fasilitas -->
                <div class="form-group">
                    <label for="facility">Facility</label>
                    <textarea class="form-control @error('facility') is-invalid @enderror" name="facility" rows="3" placeholder="Ketik di sini jika tidak ada pilihan fasilitas...">{{ request()->old('facility') }}</textarea>
                    @error('facility')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                <!-- User Note -->
                <div class="form-group">
                  <label for="user_note">User Note</label>
                  <textarea class="form-control @error('user_note') is-invalid @enderror" name="user_note" rows="3" placeholder="Enter Note">{{ request()->old('user_note') }}</textarea>
                  @error('user_note')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <!-- IT Analys -->
                <div class="form-group">
                  <label for="it_analys">IT Analysis</label>
                  <textarea class="form-control @error('it_analys') is-invalid @enderror" name="it_analys" rows="3" placeholder="Enter Analysis">{{ request()->old('it_analys') }}</textarea>
                  @error('it_analys')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>



              </div>
  
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection