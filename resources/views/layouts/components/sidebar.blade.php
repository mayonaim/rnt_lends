        @php
            $userRole = auth()->user()->role;
            $roleTiers = [
                'supervisor' => 0,
                'borrower' => 1,
                'pic' => 2,
                'admin' => 3,
            ];
        @endphp
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
            style="background: #54BBC0">

            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ route($userRole . '.home') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/dashboard-icon.png') }}" width="100em" height="100em">
                </div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="{{ route($userRole . '.home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Interface
            </div>
            @if ($roleTiers[$userRole] == 3)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route($userRole . '.view_users') }}">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Manajemen User</span></a>
                </li>
            @endif

            @if ($roleTiers[$userRole] >= 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route($userRole . '.view_assets') }}">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Assets</span></a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route($userRole . '.view_borrowing_requests') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Riwayat</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
