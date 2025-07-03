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
                <a href="{{ route($role . '.pkl.index') }}" class="bottom-nav-item {{ request()->is($role . '/pkl') ? 'active' : '' }}"
                    style="text-decoration: none">
                    <i class="fas fa-map-marker-alt bottom-nav-icon"></i>
                    <span>Tempat</span>
                </a>
                <a href="{{ route( $role . '.laporan.index') }}" class="bottom-nav-item {{ request()->is($role . '/laporan') ? 'active' : '' }}"
                    style="text-decoration: none">
                    <i class="fas fa-file-alt bottom-nav-icon"></i>
                    <span>Laporan</span>
                </a>
                <a href="{{ route($role . '.penilaian.index') }}" class="bottom-nav-item {{ request()->is($role . '/penilaian') ? 'active' : '' }}"
                    data-page="penilaian" style="text-decoration: none">
                    <i class="fas fa-star bottom-nav-icon"></i>
                    <span>Nilai</span>
                </a>
                <a href="{{ route($role. '.absensi.index') }}"
                    class="bottom-nav-item {{ request()->is($role . '/absensi') ? 'active' : '' }} data-page="absensi"
                    style="text-decoration: none">
                    <i class="fas fa-calendar-alt bottom-nav-icon"></i>
                    <span>Absensi</span>
                </a>
            </div>
        @endif
