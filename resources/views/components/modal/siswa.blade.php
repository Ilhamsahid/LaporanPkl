<div id="siswa-modal{{ $id ?? '' }}" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Tambah Data Siswa</h3>
            <button class="modal-close" onclick="closeModal('siswa-modal{{ $id ?? ''}}')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="siswa-form" action="">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="{{ $siswa ?? '' }}" placeholder="Nama Lengkap" required>
                        <div class="form-error" id="nama-error"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Telepon</label>
                        <input type="tel" class="form-control" name="telepon" placeholder="Nomor Telepon" required>
                        <div class="form-error" id="telepon-error"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    <div class="form-error" id="email-error"></div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Kelas</label>
                        <select class="form-control" name="kelas" required>
                            <option value="">Pilih Kelas</option>
                            <option value="XII RPL 1">XII RPL 1</option>
                            <option value="XII RPL 2">XII RPL 2</option>
                            <option value="XII TKJ 1">XII TKJ 1</option>
                            <option value="XII TKJ 2">XII TKJ 2</option>
                            <option value="XII MM 1">XII MM 1</option>
                            <option value="XII MM 2">XII MM 2</option>
                        </select>
                        <div class="form-error" id="kelas-error"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Pembimbing</label>
                        <select class="form-control" name="pembimbing_id" required>
                            <option value="">Pilih Pembimbing</option>
                            <option value="1">Dr. Indira Sari, M.Pd</option>
                            <option value="2">Prof. Bambang Wijaya, M.T</option>
                            <option value="3">Drs. Agus Salim, M.Kom</option>
                        </select>
                        <div class="form-error" id="pembimbing_id-error"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label required">Tempat PKL</label>
                    <select class="form-control" name="tempat_pkl_id" required>
                        <option value="">Pilih Tempat PKL</option>
                        <option value="1">PT. Teknologi Maju</option>
                        <option value="2">CV. Digital Solutions</option>
                        <option value="3">PT. Media Kreatif</option>
                    </select>
                    <div class="form-error" id="tempat_pkl_id-error"></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat lengkap"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeModal('siswa-modal')">Batal</button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </div>
        </form>
    </div>
</div>
