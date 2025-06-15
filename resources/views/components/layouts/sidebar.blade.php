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
                <li class="nav-item" >
                    <a href="{{ route($role.'.dashboard') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is($role.'/dashboard') ? 'active' : '' }}">
                            <i class="fas fa-home nav-icon"></i>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route($role . '.siswa.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is($role . '/siswa') ? 'active' : '' }}">
                            <i class="fas fa-users nav-icon"></i>
                            <span>{{ $role == 'pembimbing' ? 'Siswa Bimbingan' : 'Data Siswa'}}</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item" style="display: {{ $role == 'pembimbing' ? 'none' : 'list-item'}}">
                    <a href="{{ route('admin.pembimbing.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('admin/pembimbing') ? 'active' : '' }}">
                            <i class="fas fa-user-check nav-icon"></i>
                            <span>Data Pembimbing</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pkl.index') }}" style="text-decoration: none; display:{{ $role == 'pembimbing' ? 'none' : ''}}">
                        <div class="nav-link {{ request()->is('admin/pkl') ? 'active' : '' }}">
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
                    <a href="{{ route('admin.laporan.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('admin/laporan') ? 'active' : '' }}">
                            <i class="fas fa-file-alt nav-icon"></i>
                            <span>Laporan PKL</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.penilaian.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('admin/penilaian') ? 'active' : '' }}">
                            <i class="fas fa-chart-bar nav-icon"></i>
                            <span>Penilaian</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.absensi.index') }}" style="text-decoration: none">
                        <div class="nav-link {{ request()->is('admin/absensi') ? 'active' : '' }}">
                            <i class="fas fa-calendar-alt nav-icon"></i>
                            <span>Absensi</span>
                        </div>
                    </a>
                </li>

                <div class="nav-section" style="display: {{ $role == 'pembimbing' ? 'list-item' : 'none'}} ">
                    <h3 class="nav-section-title">Profil</h3>
                    <div class="nav-link" data-page="profil">
                        <i class="fas fa-user nav-icon"></i>
                        <span>Profil Saya</span>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
</aside>
