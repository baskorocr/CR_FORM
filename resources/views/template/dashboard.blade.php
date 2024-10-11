<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.dashboard.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake img-circle" src="{{ asset('logo/icon.png') }}" alt="PT Dharma Polimetal Tbk" height="100" width="100">
  </div>

  @include('partials.dashboard.navbar')

  @include('partials.dashboard.sidebar')

  <div class="content-wrapper">
    @yield('breadcrumbs')

    @yield('content')
  </div>
  
  @include('partials.dashboard.footer')
</div>

@include('partials.dashboard.script')
@yield('script')

<script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
  });

  @if(session('success'))
      Toast.fire({
          icon: 'success',
          title: '{{ session('success') }}' 
      })
  @endif

  @if(session('message'))
      Toast.fire({
          icon: 'success',
          title: '{{ session('success') }}' 
      })
  @endif
</script>
</body>
</html>
