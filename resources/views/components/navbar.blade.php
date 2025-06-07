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
            <div class="dropdown-item" onclick="showPage('profil')">
                <i class="fas fa-user"></i>
                <span>Profil Saya</span>
            </div>
            <div class="dropdown-item">
                <i class="fas fa-cog"></i>
                <span>Pengaturan</span>
            </div>
            <div class="dropdown-item logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <i class="fas fa-sign-out-alt"></i>
                    <button type="submit">
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
