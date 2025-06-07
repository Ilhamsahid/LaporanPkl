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

                <input type="hidden" name="mode" value="{{ $mode }}">

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="{{ $siswa->nama ?? '' }}"
                            placeholder="Nama Lengkap" required>
                        @if (!isset($id))
                            <input type="hidden" name="password">
                        @endif
                        @error('nama')
                            @if (session('mode') == $mode)
                                <div class="form-error" id="nama-error">{{ $message }}</div>
                            @endif
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Telepon</label>
                        <input type="tel" class="form-control" name="telepon" value="{{ $siswa->telepon ?? '' }}"
                            placeholder="Nomor Telepon" required>
                        @error('telepon')
                            @if (session('mode') == $mode)
                                <div class="form-error" id="nama-error">{{ $message }}</div>
                            @endif
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $siswa->email ?? '' }}"
                        placeholder="Email" required>
                    @error('email')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
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
                        @error('kelas_id')
                            @if (session('mode') == $mode)
                                <div class="form-error" id="nama-error">{{ $message }}</div>
                            @endif
                        @enderror
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
                        @error('pembimbing_id')
                            @if (session('mode') == $mode)
                                <div class="form-error" id="nama-error">{{ $message }}</div>
                            @endif
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label required">Tempat PKL</label>
                    <select class="form-control" name="tempat_pkl_id" required>
                        <option value="" hidden
                            {{ old('tempat_pkl_id', $siswa->tempat_pkl_id ?? '') == '' ? 'selected' : '' }}>
                            {{ $siswa->tempatPkl->nama_tempat ?? 'Pilih Tempat Pkl' }}
                        </option>
                        @foreach ($tempat_pkl as $tpkl)
                            <option value="{{ $tpkl->id }}"
                                {{ old('tempat_pkl_id', $siswa->tempat_pkl_id ?? '') == $tpkl->id ? 'selected' : '' }}>
                                {{ $tpkl->nama_tempat }}
                            </option>
                        @endforeach
                    </select>
                    @error('tempat_pkl_id')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat lengkap">{{ $siswa->alamat ?? '' }}</textarea>
                    @error('alamat')
                        @if (session('mode') == $mode)
                            <div class="form-error" id="nama-error">{{ $message }}</div>
                        @endif
                    @enderror
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
