<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand d-flex justify-content-center" href="index.html">
            <img src="{{ asset('assets/img/logos/logo_teater_bahtera.png') }}" alt="Teater Bahtera"
                style="width: 80px; height: 65px">
        </a>

        <hr class="mt-0">
        <ul class="sidebar-nav">
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

            <li class="sidebar-item {{ request()->routeIs('data-alternatif.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('data-alternatif.alternatif') }}">
                    <i class="align-middle" data-feather="file-text"></i>
                    <span class="align-middle">Data Alternatif</span>
                </a>
            </li>

            <li class="sidebar-header">Perhitungan SMART</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-buttons.html">
                    <i class="align-middle" data-feather="edit"></i>
                    <span class="align-middle">Penilaian Alternatif</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-forms.html">
                    <i class="align-middle" data-feather="check-square"></i>
                    <span class="align-middle">Perhitungan</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-cards.html">
                    <i class="align-middle" data-feather="bar-chart-2"></i>
                    <span class="align-middle">Ranking</span>
                </a>
            </li>

            <li class="sidebar-header">User</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="charts-chartjs.html">
                    <i class="align-middle" data-feather="user-check"></i>
                    <span class="align-middle">Admin</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="maps-google.html">
                    <i class="align-middle" data-feather="user-plus"></i>
                    <span class="align-middle">Member</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
