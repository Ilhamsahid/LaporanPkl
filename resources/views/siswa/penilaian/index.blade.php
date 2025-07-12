@extends('layouts.app')

@section('title', 'Penilaian | SistemPKL')

@section('content')
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar')

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar', [
                    'judul' => 'Penilaian PKL',
                    'deskripsi' => 'Kelola Penilaian PKL',
                ])
            </header>

            <div class="content">
                <div class="page-section active wrapper-page-section-siswa" style="margin-bottom: 80px">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Penilaian PKL</h3>
                                <p class="card-subtitle">Hasil penilaian dari pembimbing</p>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (!$penilaianSiswa)
                                <div style="text-align: center; color: var(--text-secondary); padding: 3rem;">
                                    <i class="fas fa-star" style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                                    <h4 style="margin-bottom: 0.5rem;">Penilaian</h4>
                                    <p>Penilaian akan tersedia setelah PKL selesai</p>
                                </div>
                            @endif


                            <!-- Nilai Keseluruhan -->
                            <div
                                style="background: var(--bg-primary); border-radius: 1rem; border:1px solid var(--border-primary);padding: 1.5rem; margin-bottom: 1.5rem; text-align: center;">
                                <h4 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem;">Nilai Keseluruhan
                                </h4>

                                <div
                                    style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-bottom: 1.5rem;">
                                    <div>
                                        <div
                                            style="font-size: 2rem; font-weight: 800; color: var(--success-500); margin-bottom: 0.5rem;">
                                            {{ $penilaianSiswa->nilai_akhir }}</div>
                                        <p style="font-weight: 600;">Nilai Akhir</p>
                                    </div>
                                    <div>
                                        <div
                                            style="font-size: 2rem; font-weight: 800; color: var(--{{ getGrade($penilaianSiswa->nilai_akhir)['span'] }}-500); margin-bottom: 0.5rem;">
                                            {{ getGrade($penilaianSiswa->nilai_akhir)['grade'] }}</div>
                                        <p style="font-weight: 600;">Grade</p>
                                    </div>
                                </div>

                                <span class="badge badge-success"
                                    style="font-size: 0.875rem; padding: 0.5rem 1rem;">{{ getGrade($penilaianSiswa->nilai_akhir)['message'] }}</span>
                            </div>

                            <!-- Detail Penilaian -->
                            <div>
                                <h4 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem;">Detail Penilaian
                                </h4>

                                <div
                                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                                    <div>
                                        <div class="form-group">
                                            <label class="form-label">Nilai Keterampilan</label>
                                            <input type="text" class="form-input"
                                                value="{{ $penilaianSiswa->nilai_keterampilan }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nilai Kedisiplinan</label>
                                            <input type="text" class="form-input"
                                                value="{{ $penilaianSiswa->nilai_kedisplinan }}" readonly>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label class="form-label">Nilai Wawasan</label>
                                            <input type="text" class="form-input"
                                                value="{{ $penilaianSiswa->nilai_wawasan }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nilai Etika</label>
                                            <input type="text" class="form-input" value="{{ $penilaianSiswa->nilai_etika }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal Penilaian</label>
                                    <input type="text" class="form-input" value="15 november 2025" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
@endsection
