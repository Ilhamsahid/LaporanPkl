@php
    $route = $route ?? null;
@endphp
<div id="siswa-modal{{ $id ?? '' }}" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">{{ $mode }} Data Siswa</h3>
            <button class="modal-close" onclick="closeModal('siswa-modal{{ $id ?? '' }}')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="siswa-form" action="{{ $route ?? route('siswa.update', $id) }}" method="post">
                @csrf
                @if (isset($id))
                    @method('PUT')
                @endif
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="{{ $siswa->nama ?? '' }}"
                            placeholder="Nama Lengkap" required>
                        @if (!isset($id))
                            <input type="hidden" name="password">
                        @endif
                        <div class="form-error" id="nama-error"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Telepon</label>
                        <input type="tel" class="form-control" name="telepon" value="{{ $siswa->telepon ?? '' }}"
                            placeholder="Nomor Telepon" required>
                        <div class="form-error" id="telepon-error"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $siswa->email ?? '' }}"
                        placeholder="Email" required>
                    <div class="form-error" id="email-error"></div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Kelas</label>
                        <select class="form-control" name="kelas_id" required>
                            <option value="" hidden
                                {{ old('kelas_id', $siswa->kelas_id ?? '') == '' ? 'selected' : '' }}>
                                {{ $siswa->kelas->nama ?? 'Pilih Kelas' }}</option>
                            @foreach ($kelas as $kel)
                                <option
                                    value="{{ $kel->id }}"{{ old('kelas_id', $siswa->kelas_id ?? '') == $kel->id ? 'selected' : '' }}>
                                    {{ $kel->nama }}</option>
                            @endforeach
                        </select>
                        <div class="form-error" id="kelas-error"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Pembimbing</label>
                        <select class="form-control" name="pembimbing_id" required>
                            <option value="" hidden
                                {{ old('pembimbing_id', $siswa->pembimbing_id ?? '') == '' ? 'selected' : '' }}>
                                {{ $siswa->pembimbing->nama ?? 'Pilih Pembimbing' }}
                            </option>
                            @foreach ($pembimbing as $pem)
                                <option value="{{ $pem->id }}"
                                    {{ old('pembimbing_id', $siswa->pembimbing_id ?? '') == $pem->id ? 'selected' : '' }}>
                                    {{ $pem->nama }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-error" id="pembimbing_id-error"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label required">Tempat PKL</label>
                    <select class="form-control" name="tempat_pkl_id" required>
                        <option value="" selected hidden>
                            {{ $siswa->tempatPkl->nama_tempat ?? 'Pilih Tempat PKL' }}</option>
                        @foreach ($tempat_pkl as $tpkl)
                            <option value="{{ $tpkl->id }}" @selected($siswa->pembimbing->nama ?? '')>{{ $tpkl->nama_tempat }}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-error" id="tempat_pkl_id-error"></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat lengkap">{{ $siswa->alamat ?? '' }}</textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                onclick="closeModal('siswa-modal{{ $id ?? '' }}')">Batal</button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </div>
        </form>
    </div>
</div>
