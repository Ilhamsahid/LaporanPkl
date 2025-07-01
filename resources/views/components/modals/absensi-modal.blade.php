<div id="absensi-modal{{ $id ?? '' }}" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">{{ $mode }} Data Absensi PKL</h3>
            <button class="modal-close" onclick="closeModal('absensi-modal{{ $id ?? '' }}')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="siswa-form" action="{{ $route ?? route('absensi.update', $id) }}" method="post">
                @csrf
                @if (isset($id))
                    @method('PUT')
                @endif

                @if ($mode == 'Edit')
                    <div class="form-group">
                        <label for="siswa-select" class="form-label required">Siswa</label>
                        <input type="text" class="form-control" value="{{ $absensi->siswa->kelas->nama }}" readonly>
                    </div>
                @else
                    <div class="form-group">
                        <label for="kelas-select" class="form-label required">Kelas</label>
                        <select id="kelas-select" class="form-control" required>
                            <option value="" hidden>Pilih Kelas</option>
                            @foreach ($kelas as $kel)
                                <option value="{{ $kel->id }}">{{ $kel->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if ($mode == 'Edit')
                    <div class="form-group">
                        <label for="siswa-select" class="form-label required">Siswa</label>
                        <input type="hidden" name="siswa_id" value="{{ $absensi->siswa->id }}">
                        <input type="text" class="form-control"  value="{{ $absensi->siswa->nama }}" readonly>
                    </div>
                @else
                    <div class="form-group">
                        <label for="siswa-select" class="form-label required">Siswa</label>
                        <select id="siswa-select" name="siswa_id" class="form-control" required>
                            <option value="" hidden>Pilih Siswa</option>
                        </select>
                    </div>
                @endif

                <div class="form-group">
                    <label class="form-label required">Tanggal Absen</label>
                    <input type="date" class="form-control" name="tanggal"
                        value="{{ $absensi->tanggal ?? \Carbon\Carbon::now()->toDateString() }}"
                        placeholder="Tanggal Laporan" required>
                    @error('tanggal')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Absen Masuk</label>
                        <input type="time" class="form-control" name="jam_masuk"
                            value="{{ optional($absensi)->jam_masuk ? \Carbon\Carbon::parse($absensi->jam_masuk)->format('H:i') : \Carbon\Carbon::parse('08:00')->format('H:i') }}"
                            placeholder="Jam Absensi" required>
                        @error('jam_masuk')
                            @if (session('mode') == $mode)
                                <div class="form-error" id="nama-error">{{ $message }}</div>
                            @endif
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Absen Keluar</label>
                        <input type="time" class="form-control" name="jam_keluar"
                            value="{{ optional($absensi)->jam_keluar ? \Carbon\Carbon::parse($absensi->jam_keluar)->format('H:i') : \Carbon\Carbon::parse('17:00')->format('H:i') }}"
                            placeholder="Jam Absensi" required>
                        @error('jam_keluar')
                            @if (session('mode') == $mode)
                                <div class="form-error" id="nama-error">{{ $message }}</div>
                            @endif
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="status-select" class="form-label required">Status</label>
                    <select id="status-select" class="form-control" name="status" required>
                        <option value="" hidden>Pilih Status</option>
                        @foreach ($status as $sta)
                            <option value="{{ strtolower($sta) }}"
                                {{ strtolower(old('status', $absensi->status ?? '')) == strtolower($sta) ? 'selected' : '' }}>
                                {{ $sta }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group" style="display:{{ $role == 'pembimbing' ? 'none' : ''}}">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="3" placeholder="Masukkan Keterangan(opsional)">{{ $absensi->keterangan ?? '' }}</textarea>
                    @error('keterangan')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        onclick="closeModal('absensi-modal{{ $id ?? '' }}')">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
