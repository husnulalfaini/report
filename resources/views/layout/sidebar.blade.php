<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src="{{asset('public\asset\dist\img\indosat.jpg')}}#" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">IOH</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('public\asset\dist\img\avatar.png')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                @if(auth()->user()->role=="user")
                <a href="{{url('/profile')}}" class="d-block">{{ Auth::user()->name }}</a>
                @else <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                @endif
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(auth()->user()->role=="admin")
                <li class="nav-item">
                    <a href="{{url('/halaman_tambah')}}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p> Tambah User </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/all_user')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p> Pengguna </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/konfirmasi')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p> Permintaan User </p>
                    </a>
                </li>
                @else
                <li class="nav-item   menu-is-opening menu-open">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            SEll IN
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a href="{{url('/dashboard')}}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/sell_in')}}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p> Report Sell </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/upload')}}" class="nav-link">
                                <i class="nav-icon fas fa-upload"></i>
                                <p> Upload File </p>
                            </a>
                        </li>
                        @endif
                    </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>