@props(['row', 'name_modal'])

<div class="mobile-card-actions">
    <button class="action-btn action-btn-view" title="Lihat Detail">
        <i class="fas fa-eye"></i>
    </button>
    <button class="action-btn action-btn-edit" title="Edit"
        onclick="openModal('{{ $name_modal }}{{ $row->id }}', {{ $row->id }}, 'Edit')">
        <i class="fas fa-edit"></i>
    </button>
    <button class="action-btn action-btn-delete" title="Hapus" onclick="openModal('delete-modal{{ $row->id }}')">
        <i class="fas fa-trash"></i>
    </button>
</div>
