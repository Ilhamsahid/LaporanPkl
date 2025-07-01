<div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 2rem; text-align: center;">
    <div class="profile-avatar" style="width: 4rem; height: 4rem; font-size: 1rem; margin-bottom: 1rem;">
        {{ getInitials(Auth::user()->nama) }}</div>
    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.25rem;">{{ Auth::user()->nama }}</h3>
    <p style="color: var(--text-secondary); margin-bottom: 0.5rem;">Guru Pembimbing PKL</p>
    <p style="font-size: 0.875rem; color: var(--primary-500); font-weight: 500;">
        NIP: <i class="fas fa-building"></i> {{ Auth::user()->nip }}
    </p>
</div>
<div style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
    <div>
        <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; ">
            <i class="fas fa-user" style="color: var(--primary-500);"></i>
            Informasi Pribadi
        </h4>
        <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                {{ $pembimbing->nama   }}
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                {{ $pembimbing->email }}
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Alamat</label>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                {{ $pembimbing->alamat }}
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Telepon</label>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                {{ $pembimbing->telepon }}
            </div>
        </div>

        <h4
            style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem; margin-top: 2.5rem;display: flex; align-items: center; ">
            <i class="fas fa-user" style="color: var(--primary-500);"></i>
            Statistik Pembimbingan
        </h4>

        <div style="display: flex; flex-direction: column; gap: 1rem;">
            <div
                style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-secondary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                <span style="color: var(--text-secondary);">Total Siswa Bimbingan</span>
                <span style="font-weight: 600; color: var(--text-primary);">{{ $pembimbing->siswa->count() }} Siswa</span>
            </div>
            <div
                style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-secondary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                <span style="color: var(--text-secondary);">Laporan Disetujui</span>
                <span style="font-weight: 600; color: var(--success-500);">{{ $laporanSelesai }} Laporan</span>
            </div>
            <div
                style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-secondary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                <span style="color: var(--text-secondary);">Laporan Pending</span>
                <span style="font-weight: 600; color: var(--warning-500);">{{ $laporanPending }} Laporan</span>
            </div>
            <div
                style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-secondary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                <span style="color: var(--text-secondary);">Tempat PKL Aktif</span>
                <span style="font-weight: 600; color: var(--text-primary);">{{ $tempatPklCount }} Tempat</span>
            </div>
        </div>
    </div>
</div>
