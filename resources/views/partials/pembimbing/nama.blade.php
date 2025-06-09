<div style="display: flex; align-items: center; gap: 0.75rem;">
    <div
        style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
        {{ getInitials($pembimbing->nama) ?? '' }}</div>
    <div>
        <div style="font-weight: 600; color: var(--text-primary);">{{ $pembimbing->nama }}</div>
    </div>
</div>
