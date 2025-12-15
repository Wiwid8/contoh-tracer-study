<header>
    <nav class="bg-white shadow-sm navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ auth()->check()
                ? (auth()->user()->role == 'admin' ? route('public') : route('alumni.dashboard'))
                : route('public') }}">
                <img src="{{ asset('logo-tracer-study.png') }}" style="height:50px">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                {{-- NAVIGATION MENU --}}
                <ul class="navbar-nav me-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    @else
                        @if(auth()->user()->role == 'admin')
                            {{-- Admin menggunakan tampilan guest --}}
                            <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                            <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                        @else
                            {{-- Alumni --}}
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('alumni.kuesioner') ? 'active' : '' }}"
                                   href="{{ route('alumni.kuesioner') }}">
                                   <i class="fas fa-clipboard-list me-1"></i> Kuesioner
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('leaderboard.index') ? 'active' : '' }}"
                                   href="{{ route('leaderboard.index') }}">
                                   <i class="fas fa-crown me-1"></i> Leaderboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('forum.index') ? 'active' : '' }}"
                                   href="{{ route('forum.index') }}">
                                   <i class="fas fa-comments me-1"></i> Forum
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('mentorship.index') ? 'active' : '' }}"
                                   href="#">
                                   <i class="fas fa-chalkboard-teacher me-1"></i> Mentorship
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('jobs.index') ? 'active' : '' }}"
                                   href="{{ route('jobs.index') }}">
                                   <i class="fas fa-briefcase me-1"></i> Lowongan Kerja
                                </a>
                            </li>
                        @endif
                    @endguest
                </ul>

                {{-- RIGHT SIDE BUTTONS --}}
                <div class="d-flex align-items-center">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-primary-custom me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary-custom">Daftar</a>
                    @else
                        {{-- Notification --}}
                        @if(auth()->user()->role != 'admin')
                        <div class="dropdown me-3">
                            <button class="btn btn-outline-secondary position-relative" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-bell"></i>
                                <span class="top-0 position-absolute start-100 translate-middle badge rounded-pill bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="px-3 py-2 fw-semibold">Notifikasi</div>
                                <div class="dropdown-divider"></div>
                                <div class="px-3 text-muted">Belum ada notifikasi</div>
                            </div>
                        </div>
                        @endif

                        {{-- Profile Dropdown --}}
                        <div class="dropdown">
                            <button class="btn btn-outline-primary d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                                <div class="user-avatar me-2">{{ strtoupper(substr(auth()->user()->name,0,2)) }}</div>
                                <span>{{ auth()->user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="px-3 py-2">
                                    <div class="fw-semibold">{{ auth()->user()->name }}</div>
                                    <small class="text-muted">{{ auth()->user()->email }}</small>
                                </li>
                                <li><hr class="dropdown-divider"></li>

                                @if(auth()->user()->role == 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user me-2"></i> Profil Saya</a></li>
                                @endif

                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>

            </div>
        </div>
    </nav>

    {{-- Logout Modal --}}
    @auth
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-sign-out-alt me-2"></i> Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin keluar dari sistem?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth
</header>
