<div style="display: flex; align-items: center; gap: 0.75rem;">
    <div
        style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
        {{ getInitials($siswa->nama) }}
    </div>
    <div>
        <div style="font-weight: 600; color: var(--text-primary);">
            {{ $siswa->nama }}
        </div>
        <div style="font-size: 0.75rem; color: var(--text-secondary);">
            {{ optional($siswa->kelas)->nama }}
        </div>
    </div>
</div>