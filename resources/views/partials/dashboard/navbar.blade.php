<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('home') }}" class="nav-link">Home</a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">
    <!-- User Profile -->
    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="{{ asset('template/dashboard/dist/img/avatar5.png') }}" class="user-image img-circle elevation-2" alt="Image">
        <span class="d-none d-md-inline">{{ auth()->user()->username }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <!-- User image -->
        <li class="user-header bg-primary">
          <img src="{{ asset('template/dashboard/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="Image">
          <p>
            {{ auth()->user()->profile->name }} 
            <small>{{ auth()->user()->role->name }}</small>
          </p>
        </li>

        <!-- Menu Footer-->
        <li class="user-footer">
          <a href="{{ route('profile.index') }}" class="btn btn-default btn-flat">Profile</a>
          <a href="#" class="float-right">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="btn btn-default btn-flat" type="submit">Logout</button>
            </form>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>