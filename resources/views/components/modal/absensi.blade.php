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
                        <input type="text" class="form-control" value="{{ $absensi->siswa->nama }}" readonly>
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
                    <div class="form-error" id="nama-error"></div>
                </div>

                <div class="form-group">
                    <label class="form-label required">Jam Absensi</label>
                    <input type="time" class="form-control" name="jam_masuk"
                        value="{{ $absensi->jam_masuk ?? \Carbon\Carbon::now()->format('H:i') }}"
                        placeholder="Jam Absensi" required>
                    <div class="form-error" id="jam-error"></div>
                </div>

                <input type="hidden" name="jam_keluar" value="17:00">

                <div class="form-group">
                    <label for="status-select" class="form-label required">Status</label>
                    <select id="status-select" class="form-control" name="status" required>
                        <option value="" hidden>Pilih Status</option>
                        @foreach ($status as $sta)
                            <option value="{{ $sta }}"
                                {{ strtolower(old('status', $absensi->status ?? '')) == strtolower($sta) ? 'selected' : '' }}>
                                {{ $sta }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="3" placeholder="Keterangan">{{ $absensi->keterangan ?? '' }}</textarea>
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
