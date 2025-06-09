@php
    $route = $route ?? null;
@endphp
<div id="tempatPkl-modal{{ $id ?? '' }}" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">{{ $mode }} Data Tempat PKL</h3>
            <button class="modal-close" onclick="closeModal('tempatPkl-modal{{ $id ?? '' }}')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="siswa-form" action="{{ $route ?? route('pkl.update', $id) }}" method="post">
                @csrf
                @if (isset($id))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label class="form-label required">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_tempat"
                        value="{{ $tempatPkl->nama_tempat ?? '' }}" placeholder="Nama Lengkap" required>
                    @error('nama_tempat')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label required">Bidang</label>
                    <input type="text" class="form-control" name="bidang" value="{{ $tempatPkl->bidang ?? '' }}"
                        placeholder="Nama Bidang" required>
                    @if (!isset($id))
                        <input type="hidden" name="password">
                    @endif
                    @error('bidang')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $tempatPkl->email ?? '' }}"
                        placeholder="Email" required>
                    @error('email')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label required">Telepon</label>
                    <input type="tel" class="form-control" name="telepon" value="{{ $tempatPkl->telepon ?? '' }}"
                        placeholder="Nomor Telepon" required>
                    @error('telepon')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat lengkap">{{ $tempatPkl->alamat ?? '' }}</textarea>
                    @error('alamat')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                onclick="closeModal('tempatPkl-modal{{ $id ?? '' }}')">Batal</button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </div>
        </form>
    </div>
</div>
