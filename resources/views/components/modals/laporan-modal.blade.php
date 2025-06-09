@php
    $route = $route ?? null;
@endphp
<div id="laporan-modal{{ $id ?? '' }}" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">{{ $mode }} Data Laporan PKL</h3>
            <button class="modal-close" onclick="closeModal('laporan-modal{{ $id ?? '' }}')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="siswa-form" action="{{ $route ?? route('laporan.update', $id) }}" method="post">
                @csrf
                @if (isset($id))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label class="form-label required">Judul Laporan</label>
                    <input type="text" class="form-control" name="judul" value="{{ $laporan->judul ?? '' }}"
                        placeholder="Judul Laporan" required>
                    @error('judul')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label required">Ringkasan Laporan</label>
                    <input type="text" class="form-control" name="isi_laporan" value="{{ $laporan->isi_laporan ?? '' }}"
                        placeholder="Isi Laporan" required>
                    @error('isi_laporan')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label required">Siswa</label>
                    <select class="form-control" name="siswa_id" required>
                        <option value="" hidden
                            {{ old('siswa_id', $laporan->siswa_id ?? '') == '' ? 'selected' : '' }}>
                            {{ $laporan->siswa->nama ?? 'Pilih Siswa' }}</option>
                        @foreach ($siswas as $siswa)
                            <option
                                value="{{ $siswa->id }}"{{ old('siswa_id', $laporan->siswa_id ?? '') == $siswa->id ? 'selected' : '' }}>
                                {{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label required">Tanggal Laporan</label>
                    <input type="date" class="form-control" name="tanggal" value="{{ $laporan->tanggal ?? \Carbon\Carbon::now()->toDateString() }}"
                        placeholder="Tanggal Laporan" required>
                    @error('tanggal')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label required">Jenis Laporan</label>
                    <select class="form-control" name="jenis_laporan" required>
                        <option value="" hidden
                            {{ old('jenis_laporan', $laporan->jenis_laporan ?? '') == '' ? 'selected' : '' }}>
                            {{ $laporan->jenis_laporan ?? 'Pilih Jenis' }}</option>
                        @foreach ($jeniss as $jenis)
                            <option
                                value="{{ $jenis }}"{{ old('jenis_laporan', $laporan->jenis_laporan ?? '') == $jenis ? 'selected' : '' }}>
                                {{ $jenis }}</option>
                        @endforeach
                    </select>
                    @error('jenis_laporan')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                onclick="closeModal('laporan-modal{{ $id ?? '' }}')">Batal</button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </div>
        </form>
    </div>
</div>
