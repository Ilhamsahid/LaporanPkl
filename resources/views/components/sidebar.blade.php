<aside id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <img src="{{ asset('images/smkLogo.png') }}" alt="" width="50px" height="75px" srcset="">
            <div class="logo-text">
                <h2>SMKN 1 Probolinggo</h2>
                <p>Laporan PKL</p>
            </div>
        </div>
        <button id="sidebar-close" class="sidebar-close">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section">
            <h3 class="nav-section-title">Menu Utama</h3>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-home nav-icon"></i>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('siswa.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('siswa') ? 'active' : '' }}">
                            <i class="fas fa-users nav-icon"></i>
                            <span>Data Siswa</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembimbing.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('pembimbing') ? 'active' : '' }}">
                            <i class="fas fa-user-check nav-icon"></i>
                            <span>Data Pembimbing</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pkl.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('pkl') ? 'active' : '' }}">
                            <i class="fas fa-map-marker-alt nav-icon"></i>
                            <span>Tempat PKL</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="nav-section">
            <h3 class="nav-section-title">Laporan & Penilaian</h3>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('laporan') ? 'active' : '' }}">
                            <i class="fas fa-file-alt nav-icon"></i>
                            <span>Laporan PKL</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penilaian.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('penilaian') ? 'active' : '' }}">
                            <i class="fas fa-chart-bar nav-icon"></i>
                            <span>Penilaian</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('absensi.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('absensi') ? 'active' : '' }}">
                            <i class="fas fa-calendar-alt nav-icon"></i>
                            <span>Absensi</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
