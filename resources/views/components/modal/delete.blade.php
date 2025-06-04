<div id="delete-modal" class="modal">
    <div class="modal-content" style="max-width: 400px;">
        <div class="modal-header">
            <h3 class="modal-title">Konfirmasi Hapus</h3>
            <button class="modal-close" onclick="closeModal('delete-modal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div style="text-align: center; padding: 1rem;">
                <div
                    style="width: 4rem; height: 4rem; background: #fee2e2; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <i class="fas fa-exclamation-triangle" style="color: var(--danger-500); font-size: 1.5rem;"></i>
                </div>
                <p style="margin-bottom: 0.5rem; font-weight: 600; color: var(--text-primary);">Apakah Anda yakin?</p>
                <p style="margin: 0; color: var(--text-secondary); font-size: 0.875rem;" id="delete-message">
                    Data yang dihapus tidak dapat dikembalikan.
                </p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeModal('delete-modal')">Batal</button>
            <form action="{{ $route ?? '' }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
