@extends('layouts.app')

@section('title', 'Beranda | SistemPKL')

@section('content')
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar')

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar', [
                    'judul' => 'Dashboard',
                    'deskripsi' => 'Sistem Manajemen PKL',
                ])
            </header>

            <div class="content">
                <div id="dashboard" class="page-section active wrapper-page-section-siswa" style="margin-bottom: 80px">
                    <!-- Statistics Cards -->
                    <div class="stats-grid" >
                        <div class="stat-card">
                            <div class="stat-header">
                                <h3 class="stat-title">Total Absensi</h3>
                                <div class="stat-icon"
                                    style="background: linear-gradient(135deg, var(--primary-500), var(--primary-600));">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                            </div>
                            <div class="stat-value">45</div>
                            <div class="stat-change" style="color: var(--success-500);">
                                <i class="fas fa-arrow-up"></i>
                                <span>Hari hadir</span>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <h3 class="stat-title">Laporan PKL</h3>
                                <div class="stat-icon"
                                    style="background: linear-gradient(135deg, var(--success-500), #059669);">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                            <div class="stat-value">12</div>
                            <div class="stat-change" style="color: var(--success-500);">
                                <i class="fas fa-plus"></i>
                                <span>Laporan dibuat</span>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <h3 class="stat-title">Nilai Akhir</h3>
                                <div class="stat-icon"
                                    style="background: linear-gradient(135deg, var(--warning-500), #d97706);">
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="stat-value">88</div>
                            <div class="stat-change" style="color: var(--success-500);">
                                <i class="fas fa-trophy"></i>
                                <span>Grade A</span>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <h3 class="stat-title">Status PKL</h3>
                                <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                            </div>
                            <div class="stat-value">Aktif</div>
                            <div class="stat-change" style="color: var(--success-500);">
                                <i class="fas fa-check"></i>
                                <span>Sedang PKL</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Aksi Cepat</h3>
                                <p class="card-subtitle">Shortcut untuk tugas harian</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div
                                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 0.75rem;">
                                <button class="btn btn-primary" onclick="showPage('absensi')"
                                    style="height: 4rem; flex-direction: column;">
                                    <i class="fas fa-clock" style="font-size: 1.25rem; margin-bottom: 0.25rem;"></i>
                                    <span>Absen Hari Ini</span>
                                </button>
                                <button class="btn btn-primary" onclick="showPage('laporan')"
                                    style="height: 4rem; flex-direction: column;">
                                    <i class="fas fa-file-alt" style="font-size: 1.25rem; margin-bottom: 0.25rem;"></i>
                                    <span>Buat Laporan</span>
                                </button>
                                <button class="btn btn-primary" onclick="showPage('nilai')"
                                    style="height: 4rem; flex-direction: column;">
                                    <i class="fas fa-star" style="font-size: 1.25rem; margin-bottom: 0.25rem;"></i>
                                    <span>Lihat Nilai</span>
                                </button>
                                <button class="btn btn-primary" onclick="showPage('profil')"
                                    style="height: 4rem; flex-direction: column;">
                                    <i class="fas fa-user" style="font-size: 1.25rem; margin-bottom: 0.25rem;"></i>
                                    <span>Edit Profil</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Today's Status -->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Status Hari Ini</h3>
                                <p class="card-subtitle">Rabu, 20 November 2024</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="attendance-status" id="today-status">
                                <div style="font-size: 3rem; color: var(--text-secondary); margin-bottom: 0.5rem;">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <h4 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">Belum Absen</h4>
                                <p style="color: var(--text-secondary); margin-bottom: 1rem;">Jangan lupa untuk absen hari
                                    ini</p>

                                <button class="btn btn-primary" onclick="showPage('absensi')">
                                    <i class="fas fa-calendar-check"></i>
                                    <span>Absen Sekarang</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>

    </div>
@endsection
