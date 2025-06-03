@extends('layouts.app')

@section('title', 'Dashboard | SistemPKL')

@section('content')
    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="mobile-overlay"></div>
    
    <div class="app-container">
        <!-- Sidebar -->
        @include('components.sidebar')
        
        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button id="sidebar-toggle" class="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title">
                        <h1 id="page-title">Dashboard</h1>
                        <p class="header-subtitle" id="page-subtitle">Sistem Manajemen PKL</p>
                    </div>
                </div>
                
                @include('components.navbar')
            </header>
            
            <!-- Content -->
            <div class="content">
                <!-- Dashboard Page -->
                <div id="dashboard" class="page-section active">
                    <!-- Statistics Cards -->
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-header">
                                <h3 class="stat-title">Total Siswa PKL</h3>
                                <div class="stat-icon" style="background: linear-gradient(135deg, var(--primary-500), var(--primary-600));">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="stat-value">156</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+12% dari bulan lalu</span>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-header">
                                <h3 class="stat-title">Pembimbing Aktif</h3>
                                <div class="stat-icon" style="background: linear-gradient(135deg, var(--success-500), #059669);">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="stat-value">24</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+5% dari bulan lalu</span>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-header">
                                <h3 class="stat-title">Tempat PKL</h3>
                                <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <div class="stat-value">45</div>
                            <div class="stat-change neutral">
                                <i class="fas fa-minus"></i>
                                <span>Stabil</span>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-header">
                                <h3 class="stat-title">Laporan Terkumpul</h3>
                                <div class="stat-icon" style="background: linear-gradient(135deg, var(--warning-500), #d97706);">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                            <div class="stat-value">1,247</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+18% dari minggu lalu</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dashboard Widgets -->
                    <div class="dashboard-widgets">
                        <!-- Recent Reports -->
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h3 class="card-title">Laporan Terbaru</h3>
                                    <p class="card-subtitle">Laporan PKL yang baru dikirim</p>
                                </div>
                                <button class="btn btn-secondary" onclick="showPage('laporan-pkl')">
                                    <span>Lihat Semua</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="widget-item">
                                    <div class="widget-item-content">
                                        <div class="widget-item-icon" style="background: var(--primary-100); color: var(--primary-600);">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        <div class="widget-item-text">
                                            <div class="widget-item-title">Laporan PKL Minggu 3</div>
                                            <div class="widget-item-subtitle">oleh Ahmad Rizki Pratama</div>
                                        </div>
                                    </div>
                                    <span class="badge badge-primary">mingguan</span>
                                </div>
                                
                                <div class="widget-item">
                                    <div class="widget-item-content">
                                        <div class="widget-item-icon" style="background: #dcfce7; color: #166534;">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        <div class="widget-item-text">
                                            <div class="widget-item-title">Laporan PKL Minggu 3</div>
                                            <div class="widget-item-subtitle">oleh Siti Nurhaliza</div>
                                        </div>
                                    </div>
                                    <span class="badge badge-primary">mingguan</span>
                                </div>
                                
                                <div class="widget-item">
                                    <div class="widget-item-content">
                                        <div class="widget-item-icon" style="background: #fef3c7; color: #92400e;">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        <div class="widget-item-text">
                                            <div class="widget-item-title">Laporan PKL Akhir</div>
                                            <div class="widget-item-subtitle">oleh Budi Santoso</div>
                                        </div>
                                    </div>
                                    <span class="badge badge-warning">akhir</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Today's Attendance -->
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h3 class="card-title">Absensi Hari Ini</h3>
                                    <p class="card-subtitle">Status kehadiran siswa PKL</p>
                                </div>
                                <button class="btn btn-secondary" onclick="showPage('absensi')">
                                    <span>Lihat Semua</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="widget-item">
                                    <div class="widget-item-content">
                                        <div class="widget-item-icon" style="background: #dcfce7; color: #166534;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="widget-item-text">
                                            <div class="widget-item-title">Ahmad Rizki Pratama</div>
                                            <div class="widget-item-subtitle">PT. Teknologi Maju</div>
                                        </div>
                                    </div>
                                    <span class="badge badge-success">hadir</span>
                                </div>
                                
                                <div class="widget-item">
                                    <div class="widget-item-content">
                                        <div class="widget-item-icon" style="background: #fef3c7; color: #92400e;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="widget-item-text">
                                            <div class="widget-item-title">Siti Nurhaliza</div>
                                            <div class="widget-item-subtitle">CV. Digital Solutions</div>
                                        </div>
                                    </div>
                                    <span class="badge badge-warning">izin</span>
                                </div>
                                
                                <div class="widget-item">
                                    <div class="widget-item-content">
                                        <div class="widget-item-icon" style="background: #dcfce7; color: #166534;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="widget-item-text">
                                            <div class="widget-item-title">Budi Santoso</div>
                                            <div class="widget-item-subtitle">PT. Teknologi Maju</div>
                                        </div>
                                    </div>
                                    <span class="badge badge-success">hadir</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Aksi Cepat</h3>
                                <p class="card-subtitle">Shortcut untuk tugas umum</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="quick-actions">
                                <button class="btn btn-primary quick-action-btn" onclick="showPage('data-siswa')">
                                    <i class="fas fa-user-plus"></i>
                                    <span>Tambah Siswa</span>
                                </button>
                                <button class="btn btn-primary quick-action-btn" onclick="showPage('tempat-pkl')">
                                    <i class="fas fa-building"></i>
                                    <span>Tambah Tempat PKL</span>
                                </button>
                                <button class="btn btn-primary quick-action-btn" onclick="showPage('laporan-pkl')">
                                    <i class="fas fa-file-plus"></i>
                                    <span>Buat Laporan</span>
                                </button>
                                <button class="btn btn-primary quick-action-btn" onclick="showPage('penilaian')">
                                    <i class="fas fa-star"></i>
                                    <span>Input Nilai</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection