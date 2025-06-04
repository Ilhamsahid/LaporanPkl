@php
    $route = $route ?? null;
@endphp
<div id="laporan-pkl-modal{{ $id ?? '' }}" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">{{ $mode }} Data Tempat PKL</h3>
            <button class="modal-close" onclick="closeModal('laporan-pkl-modal{{ $id ?? '' }}')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="siswa-form" action="{{ $route ?? route('laporan.update', $id) }}" method="post">
                @csrf
                @if (isset($id))
                    @method('PUT')
                @endif
                
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                onclick="closeModal('laporan-pkl-modal{{ $id ?? '' }}')">Batal</button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </div>
        </form>
    </div>
</div>
