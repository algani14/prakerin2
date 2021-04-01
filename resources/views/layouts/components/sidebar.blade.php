<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ asset('assets/dist/img/brand/blue.png') }}" class="navbar-brand-img" alt="">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/provinsi') }}">

                            <span class="nav-link-text">Provinsi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/kota') }}">

                            <span class="nav-link-text">Kota</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/kecamatan') }}">

                            <span class="nav-link-text">Kecamatan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/desa') }}">

                            <span class="nav-link-text">Desa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/rw') }}">

                            <span class="nav-link-text">Rw</span>
                        </a>
                    </li>
                    @if (Auth::user()->role == 'Petugas')
                    @else
                        <li class="nav-item">
                            <a href="{{ route('kasus.index') }}" class="nav-link @stack('kasus')">

                                <p>Laporan Kasus</p>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->role == 'Petugas')
                    @else
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link @stack('user')">

                                <p>User</p>
                            </a>
                        </li>
                    @endif

            </div>
        </div>
    </div>
</nav>
