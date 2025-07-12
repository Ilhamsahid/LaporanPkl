<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">Absensi PKL</h3>
            <p class="card-subtitle">{{ \Carbon\Carbon::parse(now())->locale('id')->translatedFormat('l, d F Y') }}
            </p>
        </div>
    </div>
    <div class="card-body">
        <!-- Absen Hari Ini -->
        <div
            style="background: var(--bg-primary); border-radius: 1rem; border:1px solid var(--border-primary); padding: 1.5rem; margin-bottom: 1.5rem; text-align: center;">
            <h4 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem;">Absensi Hari Ini
            </h4>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-bottom: 1.5rem;">
                <div>
                    <div style="font-size: 1.75rem; color: var({{ $props['masuk']['icon'] }}); margin-bottom: 0.5rem;">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                    <h5 style="font-weight: 600; margin-bottom: 0.25rem;">Jam Masuk</h5>
                    <p style="font-size: 1.25rem; font-weight: 700; color: var({{ $props['masuk']['text'] }});"
                        id="jam-masuk">
                        {{ $props['masuk']['time'] ?? '--:--' }}
                    </p>
                </div>

                <div>
                    <div style="font-size: 1.75rem; color: var({{ $props['keluar']['icon'] }}); margin-bottom: 0.5rem;">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <h5 style="font-weight: 600; margin-bottom: 0.25rem;">Jam Keluar</h5>
                    <p style="font-size: 1.25rem; font-weight: 700; color: var({{ $props['keluar']['text'] }});"
                        id="jam-keluar">
                        {{ $props['keluar']['time'] }}
                    </p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.75rem;">
                <button class="{{ $props['masuk']['btn'] }}" onclick="openAttendanceModal()"
                    {{ $props['masuk']['access'] }}>
                    {{-- Saat tidak loading --}}
                    <span wire:loading.remove wire:target="absenMasuk"
                        style="display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Absen Masuk</span>
                    </span>

                    {{-- Saat loading --}}
                    <span wire:loading wire:target="absenMasuk" style="gap: 0.5rem;">
                        <i class="fas fa-spinner fa-spin"></i>
                        <span>Loading...</span>
                    </span>
                </button>
                <button class="{{ $props['keluar']['btn'] }}" wire:click='absenKeluar' {{ $props['keluar']['access'] == '' || $props['keluar']['access'] == 'disabled' ? 'disabled' : '' }}>
                    {{-- Saat tidak loading --}}
                    <span wire:loading.remove wire:target="absenKeluar"
                        style="display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Absen Keluar</span>
                    </span>

                    {{-- Saat loading --}}
                    <span wire:loading wire:target="absenKeluar" style="gap: 0.5rem;">
                        <i class="fas fa-spinner fa-spin"></i>
                        <span>Loading...</span>
                    </span>
                </button>
            </div>
        </div>

        <!-- Riwayat Absensi -->
        <div>
            <h4
                style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-history" style="color: var(--primary-500);"></i>
                Riwayat Absensi
            </h4>
            <div class="data-list">
                @foreach ($absensis as $absensi)
                    <div class="data-item">
                        <div class="data-item-header">
                            <div class="data-item-content">
                                <h5>{{ \Carbon\Carbon::parse($absensi->tanggal)->locale('id')->translatedFormat('l, d F Y') }}</h5>
                                <p>{{ $absensi->jam_masuk ? \Carbon\Carbon::parse($absensi->jam_masuk)->format('H:i') : $absensi->status }}
                                    {{ $absensi->jam_keluar ? ' - ' . \Carbon\Carbon::parse($absensi->jam_keluar)->format('H:i') : '' }}
                                </p>
                            </div>
                        @if ($absensi->status == 'hadir')
                            <span class="badge badge-success">{{ $absensi->status }}</span>
                        @elseif ($absensi->status == 'sakit' || $absensi->status == 'alpha')
                            <span class="badge badge-danger">{{ $absensi->status }}</span>
                        @else
                            <span class="badge badge-warning">{{ $absensi->status }}</span>
                        @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('post', ({
            type,
            message
        }) => {
            const notification = document.createElement("div");
            notification.style.position = "fixed";
            notification.style.bottom = "4.5rem";
            notification.style.left = "50%";
            notification.style.transform = "translateX(-50%)";
            notification.style.padding = "0.75rem 1.25rem";
            notification.style.borderRadius = "0.5rem";
            notification.style.color = "white";
            notification.style.fontSize = "0.875rem";
            notification.style.fontWeight = "500";
            notification.style.zIndex = "1000";
            notification.style.display = "flex";
            notification.style.alignItems = "center";
            notification.style.gap = "0.5rem";
            notification.style.boxShadow = "0 4px 6px rgba(0, 0, 0, 0.1)";
            notification.style.transition = "all 0.3s ease";
            notification.style.opacity = "0";
            notification.style.transform = "translate(-50%, 1rem)";
            notification.style.maxWidth = "90%";

            // Set colors based on notification type
            if (type === "success") {
                notification.style.background = "var(--success-500)";
                notification.innerHTML =
                    '<i class="fas fa-check-circle"></i> ' + message;
            } else if (type === "warning") {
                notification.style.background = "var(--warning-500)";
                notification.innerHTML =
                    '<i class="fas fa-exclamation-triangle"></i> ' + message;
            } else if (type === "error") {
                notification.style.background = "var(--danger-500)";
                notification.innerHTML =
                    '<i class="fas fa-times-circle"></i> ' + message;
            } else {
                notification.style.background = "var(--primary-500)";
                notification.innerHTML =
                    '<i class="fas fa-info-circle"></i> ' + message;
            }

            // Add to document
            document.body.appendChild(notification);

            // Trigger animation
            setTimeout(() => {
                notification.style.opacity = "1";
                notification.style.transform = "translate(-50%, 0)";
            }, 10);

            // Remove after delay
            setTimeout(() => {
                notification.style.opacity = "0";
                notification.style.transform = "translate(-50%, -1rem)";

                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        });
    </script>
@endscript
