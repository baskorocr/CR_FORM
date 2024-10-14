<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo FAMS -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('logo/icon.png') }}" alt="DPM Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">PT Dharma Polimetal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if (request()->routeIs('dashboard')) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Proposal -->
                <li class="nav-item">
                    <a href="{{ route('proposal.index') }}"
                        class="nav-link @if (request()->routeIs('proposal.*')) active @endif">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Form CR
                        </p>
                    </a>
                </li>

                <!-- Management Account -->
                @auth
                    @if (auth()->user()->role->name == 'supervisor')
                        <li class="nav-item">
                            <a href="{{ route('account.index') }}"
                                class="nav-link @if (request()->routeIs('account.*')) active @endif">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Accounts
                                </p>
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </nav>
    </div>
</aside>
