@extends('layouts.app')

@section('title', 'Absensi | SistemPKL')

@section('content')
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar')

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar', [
                    'judul' => 'Laporan PKL',
                    'deskripsi' => 'Kelola Laporan Kegiatan PKL',
                ])
            </header>

            <div class="content">
                <!-- Absensi Page -->
                <div id="absensi" class="page-section active wrapper-page-section-siswa" style="margin-bottom: 80px">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Absensi PKL</h3>
                                <p class="card-subtitle">Rabu, 20 November 2024</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Absen Hari Ini -->
                            <div
                                style="background: var(--bg-secondary); border-radius: 1rem; padding: 1.5rem; margin-bottom: 1.5rem; text-align: center;">
                                <h4 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem;">Absensi Hari Ini
                                </h4>

                                <div
                                    style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-bottom: 1.5rem;">
                                    <div>
                                        <div style="font-size: 1.75rem; color: var(--success-500); margin-bottom: 0.5rem;">
                                            <i class="fas fa-sign-in-alt"></i>
                                        </div>
                                        <h5 style="font-weight: 600; margin-bottom: 0.25rem;">Jam Masuk</h5>
                                        <p style="font-size: 1.25rem; font-weight: 700; color: var(--text-secondary);"
                                            id="jam-masuk">--:--</p>
                                    </div>

                                    <div>
                                        <div
                                            style="font-size: 1.75rem; color: var(--text-secondary); margin-bottom: 0.5rem;">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </div>
                                        <h5 style="font-weight: 600; margin-bottom: 0.25rem;">Jam Keluar</h5>
                                        <p style="font-size: 1.25rem; font-weight: 700; color: var(--text-secondary);"
                                            id="jam-keluar">--:--</p>
                                    </div>
                                </div>

                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.75rem;">
                                    <button class="btn btn-primary" onclick="absenMasuk()" id="btn-masuk">
                                        <i class="fas fa-sign-in-alt"></i>
                                        <span>Absen Masuk</span>
                                    </button>
                                    <button class="btn btn-secondary" onclick="absenKeluar()" id="btn-keluar" disabled>
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Absen Keluar</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Riwayat Absensi -->
                            <div>
                                <h4
                                    style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="fas fa-history" style="color: var(--primary-500);"></i>
                                    Riwayat Absensi
                                </h4>
                                <div class="data-list">
                                    <div class="data-item">
                                        <div class="data-item-content">
                                            <h5>Selasa, 19 November 2024</h5>
                                            <p>08:00 - 16:00</p>
                                        </div>
                                        <span class="badge badge-success">Hadir</span>
                                    </div>

                                    <div class="data-item">
                                        <div class="data-item-content">
                                            <h5>Senin, 18 November 2024</h5>
                                            <p>08:15 - 16:00</p>
                                        </div>
                                        <span class="badge badge-warning">Terlambat</span>
                                    </div>

                                    <div class="data-item">
                                        <div class="data-item-content">
                                            <h5>Jumat, 15 November 2024</h5>
                                            <p>08:00 - 16:00</p>
                                        </div>
                                        <span class="badge badge-success">Hadir</span>
                                    </div>

                                    <div class="data-item">
                                        <div class="data-item-content">
                                            <h5>Kamis, 14 November 2024</h5>
                                            <p>Tidak hadir</p>
                                        </div>
                                        <span class="badge badge-danger">Sakit</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
