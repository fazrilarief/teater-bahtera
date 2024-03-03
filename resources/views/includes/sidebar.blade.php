<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand d-flex justify-content-center" href="index.html">
            <img src="{{ asset('assets/img/logos/logo_teater_bahtera.png') }}" alt="Teater Bahtera"
                style="width: 80px; height: 65px">
        </a>

        <hr class="mt-0">
        <ul class="sidebar-nav">

            {{-- Sidebar Access Coach --}}
            @can('coach')
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('dashboard') }}">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <hr>

                <li class="sidebar-header">Master Data</li>

                <li class="sidebar-item {{ request()->routeIs('data-anggota.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('data-anggota.member') }}">
                        <i class="align-middle" data-feather="users"></i>
                        <span class="align-middle">Data Anggota</span>
                    </a>
                </li>

                <li class="sidebar-item sidebar-item {{ request()->routeIs('data-kriteria.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('data-kriteria.criteria') }}">
                        <i class="align-middle" data-feather="box"></i>
                        <span class="align-middle">Data Kriteria</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('data-sub-kriteria.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('data-sub-kriteria.sub-criteria') }}">
                        <i class="align-middle" data-feather="plus-square"></i>
                        <span class="align-middle">Data Sub Kriteria</span>
                    </a>
                </li>

                <li class="sidebar-header">Perhitungan SMART</li>

                <li class="sidebar-item {{ request()->routeIs('data-periode') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('data-periode') }}">
                        <i class="align-middle" data-feather="calendar"></i>
                        <span class="align-middle">Periode</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('penilaian-alternatif.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('penilaian-alternatif.assessment') }}">
                        <i class="align-middle" data-feather="edit"></i>
                        <span class="align-middle">Penilaian Alternatif</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('perhitungan.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('perhitungan.value-calculation') }}">
                        <i class="align-middle" data-feather="check-square"></i>
                        <span class="align-middle">Perhitungan</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('perankingan.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('perankingan.rank') }}">
                        <i class="align-middle" data-feather="bar-chart-2"></i>
                        <span class="align-middle">Ranking</span>
                    </a>
                </li>

                <li class="sidebar-header">Alat</li>

                <li class="sidebar-item {{ request()->routeIs('tools.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('tools.create-announcement') }}">
                        <i class="align-middle" data-feather="bell"></i>
                        <span class="align-middle">Buat Pengumuman</span>
                    </a>
                </li>

                <li class="sidebar-header">Pengguna</li>

                <li class="sidebar-item {{ request()->routeIs('user.admin') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('user.admin') }}">
                        <i class="align-middle" data-feather="user-check"></i>
                        <span class="align-middle">Admin</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('user.member') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('user.member') }}">
                        <i class="align-middle" data-feather="user-plus"></i>
                        <span class="align-middle">Member</span>
                    </a>
                </li>
            @endcan
            {{-- Sidebar Access Coach Ends --}}

            {{-- Sidebar Access Admin --}}
            @can('admin')
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('dashboard') }}">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <hr>

                <li class="sidebar-header">Master Data</li>
                <li class="sidebar-item {{ request()->routeIs('data-anggota.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('data-anggota.member') }}">
                        <i class="align-middle" data-feather="users"></i>
                        <span class="align-middle">Data Anggota</span>
                    </a>
                </li>

                <li class="sidebar-header">Perhitungan SMART</li>
                <li class="sidebar-item {{ request()->routeIs('perankingan.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('perankingan.rank') }}">
                        <i class="align-middle" data-feather="bar-chart-2"></i>
                        <span class="align-middle">Ranking</span>
                    </a>
                </li>

                <li class="sidebar-header">Alat</li>
                <li class="sidebar-item {{ request()->routeIs('tools.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('tools.create-announcement') }}">
                        <i class="align-middle" data-feather="bell"></i>
                        <span class="align-middle">Buat Pengumuman</span>
                    </a>
                </li>

                <li class="sidebar-header">Pengguna</li>

                <li class="sidebar-item {{ request()->routeIs('user.member') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('user.member') }}">
                        <i class="align-middle" data-feather="user-plus"></i>
                        <span class="align-middle">Member</span>
                    </a>
                </li>
            @endcan
            {{-- Sidebar Admin Access Ends --}}

            {{-- Sidebar Member Access --}}
            @can('member')
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('dashboard') }}">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <hr>

                <li class="sidebar-item {{ request()->routeIs('perankingan.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('perankingan.rank') }}">
                        <i class="align-middle" data-feather="bar-chart-2"></i>
                        <span class="align-middle">Peringkat</span>
                    </a>
                </li>
            @endcan
            {{-- Sidebar Member Access Ends --}}
        </ul>

    </div>
</nav>
