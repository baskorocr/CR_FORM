@extends('template.dashboard')

@section('breadcrumbs')
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Profile</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item active">Profile</li>
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
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{ asset('template/dashboard/dist/img/avatar5.png') }}"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

              <p class="text-muted text-center"> {{ auth()->user()->role->name }} </p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Username</b> <a class="float-right">{{ auth()->user()->username }} </a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right">{{ auth()->user()->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Created</b> <a class="float-right">{{ auth()->user()->created_at->format('l, j M Y') }} </a>
                </li>
              </ul>
            </div>
          </div>

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Overview</h3>
            </div>

            <div class="card-body">
              <strong><i class="fas fa-user mr-1"></i> Name</strong>
              <p class="text-muted">{{ ucfirst($profile->name) }}</p>
              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
              <p class="text-muted">{{ ucfirst($profile->address) }}</p>
              <hr>

              <strong><i class="fas fa-phone-alt mr-1"></i> Phone</strong>
              <p class="text-muted">{{ $profile->phone }}</p>
              <hr>

              <strong><i class="fas fa-birthday-cake mr-1"></i> Date Of Birth</strong>
              <p class="text-muted">{{ $profile->dob }}</p>
              <hr>

              <strong><i class="fas fa-venus-mars mr-1"></i> Gender</strong>
              <p class="text-muted">{{ ucfirst($profile->gender) }}</p>
              <hr>

              <strong><i class="fas fa-briefcase mr-1"></i> Job</strong>
              <p class="text-muted">{{ ucfirst($profile->occupation) }}</p>
              <hr>

              <strong><i class="far fa-id-badge mr-1"></i> About me</strong>
              <p class="text-muted">{{ ucfirst($profile->about) }}</p>
              
              <strong><i class="far fa-id-badge mr-1"></i> Photo</strong>
              <p class="text-muted">{{ ucfirst($profile->photo) }}</p>

            </div>
          </div> 
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
              </ul>
            </div>

            <div class="card-body">
              <div class="tab-content">
                <!-- Profile -->
                <div class="active tab-pane" id="profile">
                  <form action="{{ route('profile.update') }}" class="form-horizontal" method="POST">
                    @csrf
                    @method('PATCH')
                    <!-- Name -->
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $profile->name }}" placeholder="Full Name">
                        @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>

                    <!-- Address -->
                    <div class="form-group row">
                      <label for="address" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $profile->address }}" placeholder="ex : Indonesian, Jakarta">
                        @error('address')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>

                    <!-- Phone -->
                    <div class="form-group row">
                      <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" data-inputmask='"mask": "9999-9999-99999"' id="phone" name="phone" value="{{ $profile->phone }}" data-mask placeholder="ex : 0812-3456-7890">
                        @error('phone')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>

                    <!-- Date of Birth -->
                    <div class="form-group row">
                      <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('dob') is-invalid @enderror" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" id="dob" name="dob" value="{{ $profile->dob }}" data-mask placeholder="ex : 2002/02/22">
                        @error('dob')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>

                    <!-- Gender -->
                    <div class="form-group row">
                      <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                      <div class="col-sm-10">
                        <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror">
                          <option value=""> -- Select Gender -- </option>
                          @foreach ($genders as $gender)
                            <option value="{{ $gender }}" @if($profile->gender == $gender) selected @endif>{{ ucfirst($gender) }}</option>
                          @endforeach
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>

                    <!-- Occupation -->
                    <div class="form-group row">
                      <label for="occupation" class="col-sm-2 col-form-label">Job</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('occupation') is-invalid @enderror" id="occupation" name="occupation" value="{{ $profile->occupation }}" placeholder="ex : Programmer">
                        @error('occupation')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>

                    <!-- About Me -->
                    <div class="form-group row">
                      <label for="about" class="col-sm-2 col-form-label">About Me</label>
                      <div class="col-sm-10">
                        <textarea class="form-control @error('about') is-invalid @enderror" id="about" name="about" rows="3" placeholder="Enter here ...">{{ $profile->about }}</textarea>
                        @error('about')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>

                    <!-- Photo -->
                    <div class="form-group row">
                      <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                      <div class="col-sm-10">
                      <input type="file" name="photo" id="photo" class="form-control w-200px"  data-parsley-required="true">
                        @error('photo')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                     
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </div>
                  </form>
                </div>

                <!-- Change Password -->
                <div class="tab-pane" id="password">
                  <form action="{{ route('profile.password') }}" class="form-horizontal" method="POST">
                    @csrf
                    <!-- Old Password -->
                    <div class="form-group row">
                      <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
                      <div class="col-sm-10">
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                          <input type="password" class="form-control password @error('oldPassword') is-invalid @enderror" id="oldPassword" name="oldPassword" placeholder="Old Password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-eye-slash icon-toggle"></span>
                            </div>
                          </div>
                          @error('oldPassword')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        
                      </div>
                    </div>

                    <!-- New Password -->
                    <div class="form-group row">
                      <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                      <div class="col-sm-10">
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                          <input type="password" class="form-control password @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" placeholder="New Password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-eye-slash icon-toggle"></span>
                            </div>
                          </div>
                          @error('newPassword')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <!-- Confirmation Password -->
                    <div class="form-group row">
                      <label for="newPasswordConfirm" class="col-sm-2 col-form-label">Confirm Password</label>
                      <div class="col-sm-10">
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                          <input type="password" class="form-control password" id="newPasswordConfirm" name="newPassword_confirmation" placeholder="New Password Confirmation">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-eye-slash icon-toggle"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
  <!-- InputMask -->
  <script src="{{ asset('template/dashboard/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('template/dashboard/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

  <script>
    $(function () {
      //Money Euro
      $('[data-mask]').inputmask()
    })


    $(document).ready(function() {
  // Handle form submission
  $("#profile").submit(function(event) {
    event.preventDefault(); // Prevent default form submission

    // Get the file from the input
    var file = $('#photo')[0].files[0];

    // Check if a file is selected
    if (file) {
      // Create a FormData object to send the file
      var formData = new FormData();
      formData.append('photo', file); 

      // Add other form data if needed
      // formData.append('other_field_name', $('#other_field_id').val());

      // Send the AJAX request
      $.ajax({
        url: "{{ route('profile.update') }}", // Replace with your actual store route
        type: "POST",
        data: formData,
        processData: false, // Don't process data
        contentType: false, // Don't set content type
        success: function(response) {
          // Handle successful response
          console.log(response); // Log the response
          // Redirect to another page or display a success message
          // ...
        },
        error: function(error) {
          // Handle errors
          console.error(error);
          // Display an error message to the user
          // ...
        }
      });
    } else {
      // Handle case where no file is selected
      alert("Please select a photo file.");
    }
      });
    });
  </script>
@endsection