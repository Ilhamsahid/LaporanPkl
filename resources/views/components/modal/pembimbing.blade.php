@php
    $route = $route ?? null;
@endphp
<div id="pembimbing-modal{{ $id ?? '' }}" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">{{ $mode }} Data Pembimbing</h3>
            <button class="modal-close" onclick="closeModal('pembimbing-modal{{ $id ?? '' }}')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="siswa-form" action="{{ $route ?? route('siswa.update', $id) }}" method="post">
                @csrf
                @if (isset($id))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label class="form-label required">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="{{ $pembimbing->nama ?? '' }}"
                        placeholder="Nama Lengkap" required>
                    @if (!isset($id))
                        <input type="hidden" name="password">
                    @endif
                    <div class="form-error" id="nama-error"></div>
                </div>
                <div class="form-group">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $pembimbing->email ?? '' }}"
                        placeholder="Email" required>
                    <div class="form-error" id="email-error"></div>
                </div>
                <div class="form-group">
                    <label class="form-label required">Telepon</label>
                    <input type="tel" class="form-control" name="telepon" value="{{ $pembimbing->telepon ?? '' }}"
                        placeholder="Nomor Telepon" required>
                    <div class="form-error" id="telepon-error"></div>
                </div>
                <div class="form-group">
                    <label class="form-label required">NIP</label>
                    <input type="tel" class="form-control" name="nip" value="{{ $pembimbing->nip ?? '' }}"
                        placeholder="No NIP" required>
                    <div class="form-error" id="telepon-error"></div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                onclick="closeModal('pembimbing-modal{{ $id ?? '' }}')">Batal</button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </div>
        </form>
    </div>
</div>
