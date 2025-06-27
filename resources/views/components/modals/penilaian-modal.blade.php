@php
    $modalId = 'penilaian-modal';
@endphp

<div id="penilaian-modal{{ $id ?? '' }}" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modal-title">{{ $mode }} Data Penilaian</h3>
            <button class="modal-close" onclick="closeModal('{{ $modalId }}{{ $id ?? '' }}')">×</button>
        </div>

        <div class="modal-body">
            <form id="form-nilai" method="post" action="{{ $route ?? route('penilaian.update', $id) }}">
                @csrf
                @if (isset($id))
                    @method('PUT')
                @endif

                <input type="hidden" name="mode" value="{{ $mode }}">

                @if ($mode == 'Edit')
                    <div class="form-group">
                        <label for="siswa-select" class="form-label required">Kelas</label>
                        <input type="text" class="form-control" value="{{ $penilaian->kelas->nama }}"
                        readonly />
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
                        <input type="hidden" class="form-control" name="siswa_id" value="{{ $id }}" readonly>
                        <input type="text" class="form-control" value="{{ $penilaian->nama }}" readonly>
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
                    <label class="form-label required">Nilai Etika</label>
                    <input type="text" class="form-control" name="nilai_etika"
                        value="{{ $penilaian->penilaian->nilai_etika ?? '' }}" placeholder="Nilai Etika" required>
                    @error('nilai_etika')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label required">Nilai Kedisplinan</label>
                    <input type="text" class="form-control" name="nilai_kedisplinan"
                        value="{{ $penilaian->penilaian->nilai_kedisplinan ?? '' }}" placeholder="Nilai Kedisplinan" required>
                    @error('nilai_kedisplinan')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label required">Nilai Keterampilan</label>
                    <input type="text" class="form-control" name="nilai_keterampilan"
                        value="{{ $penilaian->penilaian->nilai_keterampilan ?? '' }}" placeholder="Nilai Keterampilan" required>
                    @error('nilai_keterampilan')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label required">Nilai Wawasan</label>
                    <input type="text" class="form-control" name="nilai_wawasan"
                        value="{{ $penilaian->penilaian->nilai_wawasan ?? '' }}" placeholder="Nilai Wawasan" required>
                    @error('nilai_wawasan')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                onclick="closeModal('penilaian-modal{{ $id ?? '' }}')">Batal</button>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </div>
        </form>
    </div>
</div>
