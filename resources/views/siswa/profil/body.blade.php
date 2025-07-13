<div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 2rem; text-align: center;">
    <div class="profile-avatar" style="width: 4rem; height: 4rem; font-size: 1rem; margin-bottom: 1rem;">
        {{ getInitials($siswa->nama) }}</div>
    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.25rem;">{{ $siswa->nama }}</h3>
    <p style="color: var(--text-secondary); margin-bottom: 0.5rem;">{{ $siswa->kelas->nama }} -
        {{ $siswa->tempatPkl->bidang }}</p>
    <p style="font-size: 0.875rem; color: var(--primary-500); font-weight: 500;">
        {{ $siswa->tempatPkl->nama_tempat }}
    </p>
</div>

<div style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
    <div>
        <h4
            style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; gap:0.5rem">
            <i class="fas fa-user" style="color: var(--primary-500);"></i>
            Informasi Pribadi
        </h4>
        <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <div
                style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                {{ $siswa->nama }}
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <div
                style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                {{ $siswa->email }}
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Alamat</label>
            <div
                style="display: flex; justify-content: space-between; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary); height: 100px;">
                {{ $siswa->alamat }}
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Telepon</label>
            <div
                style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                {{ $siswa->telepon }}
            </div>
        </div>


        <h4
            style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem; margin-top: 2.5rem;display: flex; align-items: center; gap:0.5rem">
            <i class="fas fa-user" style="color: var(--primary-500);"></i>
            Informasi PKL
        </h4>

        <div style="display: flex; flex-direction: column; gap: 1rem;">
            <div class="form-group">
                <label class="form-label">Kelas</label>
                <div
                    style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                    {{ $siswa->kelas->nama }}
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Pembimbing</label>
                <div
                    style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                    {{ $siswa->pembimbing->nama }}
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Tempat PKL</label>
                <div
                    style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                    {{ $siswa->tempatPkl->nama_tempat }}
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Bidang PKL</label>
                <div
                    style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: var(--bg-primary); border-radius: 0.5rem; border:1px solid var(--border-primary);">
                    {{  $siswa->tempatPkl->bidang  }}
                </div>
            </div>
        </div>
    </div>
