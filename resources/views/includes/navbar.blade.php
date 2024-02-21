<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/img/avatars/jriks.svg') }}" class="avatar img-fluid rounded me-1"
                        alt="Charles Hall" style="height: 35px" />
                    <span class="text-dark fs-5">{{ auth()->user()->username }}</span>
                </a>
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/img/avatars/jriks.svg') }}" class="avatar img-fluid rounded me-1"
                        alt="Charles Hall" />
                    <span class="text-dark">{{ auth()->user()->username }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                            data-feather="user"></i>
                        Profile</a>
                    <form action="{{ route('auth.login.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Log out</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
