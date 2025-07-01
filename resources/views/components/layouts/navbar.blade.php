@php
    function getInitials($name)
    {
        $parts = explode(' ', $name);

        if (count($parts) >= 2) {
            return strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
        } else {
            return strtoupper(substr($parts[0], 0, 2));
        }
    }
@endphp
<div class="header-left">
    <button id="sidebar-toggle" class="sidebar-toggle">
        <i class="fas fa-bars"></i>
    </button>
    <div class="header-title">
        <h1 id="page-title">{{ $judul }}</h1>
        <p class="header-subtitle" id="page-subtitle">{{ $deskripsi }}</p>
    </div>
</div>
<div class="header-right">
    <button id="theme-toggle" class="theme-toggle" title="Toggle Dark Mode"></button>
    <div class="user-profile" id="user-profile">
        <div class="profile-avatar">{{ getInitials(Auth::user()->nama) }}</div>
        <div class="profile-info">
            <div class="profile-name">{{ Auth::user()->nama }}</div>
            <div class="profile-role">
                @if (Auth::guard('admin')->check())
                    Administrator
                @elseif (Auth::guard('pembimbing')->check())
                    Pembimbing
                @elseif (Auth::guard('siswa')->check())
                    Siswa
                @endif
            </div>
        </div>
        <i class="fas fa-chevron-down" style="font-size: 0.75rem; color: var(--text-secondary);"></i>

        <!-- Profile Dropdown -->
        <div class="profile-dropdown" id="profile-dropdown">
            <a href="{{ route($role . '.profil') }}" style="text-decoration: none">
                <div class="dropdown-item">
                    <i class="fas fa-user"></i>
                    <span>Profil Saya</span>
                </div>
            </a>
            <div class="dropdown-item">
                <i class="fas fa-cog"></i>
                <span>Pengaturan</span>
            </div>
            <div class="dropdown-item logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        style="background: none; border: none; color: inherit; padding: 0; font: inherit; cursor: pointer; display: flex; align-items: center;">
                        <i class="fas fa-sign-out-alt" style="color: red; margin-right: 11px;"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
