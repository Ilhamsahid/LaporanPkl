@props(['row', 'name_modal'])
<div class="action-buttons">
    <button class="action-btn action-btn-view" title="Lihat Detail">
        <i class="fas fa-eye"></i>
    </button>
    <button style="display:{{ $role == 'pembimbing' && request()->is('pembimbing/laporan')? 'none' : '' }}" class="action-btn action-btn-edit" title="Edit"
        onclick="openModal('{{ $name_modal }}{{ $row->id }}', {{ $row->id }}, 'Edit')">
        <i class="fas fa-edit"></i>
    </button>
    <form style="display:{{
    $role == 'pembimbing' && request()->is('pembimbing/laporan') && $row->status == 'pending' 
    ? ''
    : 'none' }};
    text-decoration:none;"
    action="{{ route('pembimbing.laporan.update', $row->id) }}"
    method="POST"
    >
    @csrf
    @method('PUT')
        <button  class="action-btn action-btn-edit" title="Konfirmasi" >
            <i class="fas fa-check"></i>
        </button>
    </form>
    <button style="display:{{ $role == 'pembimbing' ? 'none' : '' }}" class="action-btn action-btn-delete"
        title="Hapus" onclick="openModal('delete-modal{{ $row->id }}')">
        <i class="fas fa-trash"></i>
    </button>
</div>
