<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">

        <span class="brand-text font-weight-bold">Web Pengajuan Beasiswa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('profile-index') }}" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        @if(\Illuminate\Support\Facades\Request::hasAny("kk"))
                            <b>Hello</b>
                        @endif
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                {{-- Role Admin --}}
                @if(Auth::user()->role == 'Admin')
                    {{-- Link ke Data User --}}
                    <li class="nav-item">
                        <a href="{{ route('admin-index') }}" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Data User
                            </p>
                        </a>
                    </li>
                    {{-- Link ke Data Fakultas --}}
                    <li class="nav-item">
                        <a href="{{ route('afk-index') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Data Fakultas
                            </p>
                        </a>
                    </li>
                    {{-- Link ke Data Prodi --}}
                    <li class="nav-item">
                        <a href="{{ route('ap-index') }}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data Prodi
                            </p>
                        </a>
                    </li>
                    {{-- Link ke Data Beasiswa Internal --}}
                    <li class="nav-item">
                        <a href={{ route('ab-index') }} class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Data Beasiswa
                            </p>
                        </a>
                    </li>
                @endif
                
                {{-- Role Fakultas --}}
                @if(Auth::user()->role == 'Fakultas')
                    {{-- Link ke Data Pengajuan Beasiswa --}}
                    <li class="nav-item">
                        <a href={{ route('fak-index') }} class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Data Periode
                            </p>
                        </a>
                    </li>
                    {{-- Link ke  --}}
                    <li class="nav-item">
                        <a href={{ route('fad-index') }} class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Daftar Mahasiswa
                            </p>
                        </a>
                    </li>
                @endif
                
                {{-- Role Prodi --}}
                @if(Auth::user()->role == 'Prodi')
                    {{-- Link ke Data Pengajuan Beasiswa --}}
                    <li class="nav-item">
                        <a href={{ route('prop-index') }} class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Data Periode
                            </p>
                        </a>
                    </li>
                    {{-- Link ke  --}}
                    <li class="nav-item">
                        <a href={{ route('proa-index') }} class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Daftar Mahasiswa
                            </p>
                        </a>
                    </li>
                @endif

                {{-- Role Mahasiswa --}}
                @if(Auth::user()->role == 'Mahasiswa')
                    {{-- Link ke Data Pengajuan Beasiswa --}}
                    <li class="nav-item">
                        <a href={{ route('mab-index') }} class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Pengajuan Beasiswa
                            </p>
                        </a>
                    </li>
                    {{-- Link ke Data Pengajuan Beasiswa --}}
                    <li class="nav-item">
                        <a href={{ route('mah-index') }} class="nav-link">
                            <i class="nav-icon fas fa-history"></i>
                            <p>
                                History Pengajuan
                            </p>
                        </a>
                    </li>
                @endif

                {{-- Link untuk Logout --}}
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="text-danger">Logout</p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
