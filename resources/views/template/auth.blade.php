<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Form CR">
  <meta name="keywords" content="Form CR, Form, Aprroval">
  <meta name="author" content="Ricky Johannes">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/dashboard/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dashboard/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
  
  @yield('main-content')

<!-- jQuery -->
<script src="{{ asset('template/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('template/dashboard/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dashboard/dist/js/dashboard/adminlte.min.js') }}"></script> 
<script src="{{ asset('template/dashboard/dist/js/dashboard/janadev.js') }}"></script> 

<script>
  $(document).ready(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });

    @if (session('success'))
      Toast.fire({
        icon: 'success',
        title: "{{ session('success') }}"
      })
    @endif

    @if (session('message'))
      Toast.fire({
        icon: 'info',
        title: "{{ session('message') }}"
      })
    @endif

  })
</script>

</body>
</html>
