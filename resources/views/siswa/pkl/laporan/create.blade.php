<div id="form-laporan" style="display: none; margin-bottom: 1.5rem;">
    <h4
        style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
        <i class="fas fa-file-alt" style="color: var(--primary-500);"></i>
        <span id="form-title">Buat Laporan Baru</span>
    </h4>

    <form id="report-form" novalidate>
        <input type="hidden" id="siswa_id" value="{{ auth()->user()->id }}">
        <div class="form-group">
            <label class="form-label required">Judul Laporan</label>
            <input type="text" id="judul" class="form-input" placeholder="Masukkan judul laporan" maxlength="255">
            <div class="char-counter" id="judul-counter">0/255</div>
            <div class="form-error" id="judul-error" style="display: none;"></div>
            <div class="form-success" id="judul-success" style="display: none;"></div>
        </div>

        <div class="form-group">
            <label class="form-label required">Jenis Laporan</label>
            <select id="jenis_laporan" class="form-select">
                <option value="">Pilih jenis laporan</option>
                <option value="mingguan">Laporan Mingguan</option>
                <option value="akhir">Laporan Akhir</option>
            </select>
            <div class="form-error" id="jenis_laporan-error" style="display: none;"></div>
            <div class="form-success" id="jenis_laporan-success" style="display: none;"></div>
        </div>

        <div class="form-group">
            <label class="form-label required">Tanggal</label>
            <input type="date" id="tanggal" class="form-input">
            <div class="form-error" id="tanggal-error" style="display: none;"></div>
            <div class="form-success" id="tanggal-success" style="display: none;"></div>
        </div>

        <div class="form-group">
            <label class="form-label required">Isi Laporan</label>
            <textarea id="isi_laporan" class="form-textarea" placeholder="Tulis isi laporan..." maxlength="5000"></textarea>
            <div class="char-counter" id="isi-counter">0/5000</div>
            <div class="form-error" id="isi-error" style="display: none;"></div>
            <div class="form-success" id="isi-success" style="display: none;"></div>
        </div>

        <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
            <button type="button" class="btn btn-secondary" onclick="batalLaporan()">
                <i class="fas fa-times"></i>
                <span>Batal</span>
            </button>
            <button type="submit" class="btn btn-primary" id="submit-btn">
                <i class="fas fa-save"></i>
                <span id="submit-text">Simpan</span>
            </button>
        </div>
    </form>
</div>
