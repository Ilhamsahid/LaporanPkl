<div class="mobile-card-title">{{ $penilaian->nama }}</div>
<div
    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
    {{ getInitials($penilaian->nama) }}
</div>
