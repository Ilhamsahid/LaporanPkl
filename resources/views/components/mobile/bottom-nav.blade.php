        @if(!request()->is('login'))
            <div class="bottom-navigation" style="">
                <a href="{{ route($role . '.dashboard') }}"
                    class="bottom-nav-item {{ request()->is($role . '/dashboard') ? 'active' : '' }}"
                    style="text-decoration: none">
                    <i class="fas fa-home bottom-nav-icon"></i>
                    <span>Home</span>
                </a>
                <a href="{{ route($role . '.siswa.index') }}"
                    class="bottom-nav-item {{ request()->is($role . '/siswa') ? 'active' : '' }}" data-page="siswa-bimbingan"
                    style="text-decoration: none">
                    <i class="fas fa-users bottom-nav-icon"></i>
                    <span>Siswa</span>
                </a>
                @if ($role=='admin')
                    <a href="{{ route('admin.pkl.index') }}" class="bottom-nav-item {{ request()->is($role . '/laporan') ? 'active' : '' }}"
                        style="text-decoration: none">
                        <i class="fas fa-map-marker-alt bottom-nav-icon"></i>
                        <span>Tempat</span>
                    </a>
                @endif
                <a href="{{ route( $role . '.laporan.index') }}" class="bottom-nav-item {{ request()->is($role . '/laporan') ? 'active' : '' }}"
                    style="text-decoration: none">
                    <i class="fas fa-file-alt bottom-nav-icon"></i>
                    <span>Laporan</span>
                </a>
                <a href="" class="bottom-nav-item {{ request()->is($role . '/penilaian') ? 'active' : '' }}"
                    data-page="penilaian" style="text-decoration: none">
                    <i class="fas fa-star bottom-nav-icon"></i>
                    <span>Nilai</span>
                </a>
                <a href=""
                    class="bottom-nav-item {{ request()->is($role . '/absensi') ? 'active' : '' }} data-page="absensi"
                    style="text-decoration: none">
                    <i class="fas fa-calendar-alt bottom-nav-icon"></i>
                    <span>Absensi</span>
                </a>
                <a href=""
                    class="bottom-nav-item {{ request()->is($role . '/profil') ? 'active' : '' }} data-page="profil"
                    style="text-decoration: none; display: {{ $role == 'pembimbing' ? '' : 'none' }}">
                    <i class="fas fa-user bottom-nav-icon"></i>
                    <span>Profil</span>
                </a>
            </div>
        @endif
