@extends('layouts.app')

@section('title', 'Laporan | SistemPKL')

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
                        <h1 id="page-title">Laporan PKL</h1>
                        <p class="header-subtitle" id="page-subtitle">Kelola Informasi Laporan PKL</p>
                    </div>
                </div>

                @include('components.navbar')
            </header>

            <!-- Content -->
            <div class="content">

                <div id="laporan-pkl" class="page-section active">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Laporan PKL</h3>
                                <p class="card-subtitle">Kelola laporan PKL siswa</p>
                            </div>
                            <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                                <div class="search-input">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="form-input" placeholder="Cari laporan..."
                                        style="width: 250px;">
                                </div>
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    <span>Tambah Laporan</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">Laporan PKL Minggu 3</div>
                                <span class="badge badge-primary">mingguan</span>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Siswa:</div>
                                    <div class="mobile-card-value">Ahmad Rizki Pratama</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Tanggal:</div>
                                    <div class="mobile-card-value">15 Nov 2024</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Status:</div>
                                    <div class="mobile-card-value"><span class="badge badge-success">Disetujui</span></div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Pembimbing:</div>
                                    <div class="mobile-card-value">Dr. Indira Sari, M.Pd</div>
                                </div>
                            </div>
                            <div class="mobile-card-actions">
                                <button class="action-btn action-btn-view" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn action-btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn action-btn-delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">Laporan PKL Minggu 2</div>
                                <span class="badge badge-primary">mingguan</span>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Siswa:</div>
                                    <div class="mobile-card-value">Siti Nurhaliza</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Tanggal:</div>
                                    <div class="mobile-card-value">08 Nov 2024</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Status:</div>
                                    <div class="mobile-card-value"><span class="badge badge-warning">Pending</span></div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Pembimbing:</div>
                                    <div class="mobile-card-value">Prof. Bambang Wijaya, M.T</div>
                                </div>
                            </div>
                            <div class="mobile-card-actions">
                                <button class="action-btn action-btn-view" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn action-btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn action-btn-delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Desktop Table View -->
                        <div class="table-container hidden-mobile">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Judul Laporan</th>
                                        <th>Siswa</th>
                                        <th>Tanggal</th>
                                        <th>Jenis</th>
                                        <th>Status</th>
                                        <th>Pembimbing</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Judul Laporan">
                                            <div>
                                                <div style="font-weight: 600; color: var(--text-primary);">Laporan PKL
                                                    Minggu 3</div>
                                                <div style="font-size: 0.75rem; color: var(--text-secondary);">Kegiatan
                                                    pengembangan
                                                    aplikasi web</div>
                                            </div>
                                        </td>
                                        <td data-label="Siswa">Ahmad Rizki Pratama</td>
                                        <td data-label="Tanggal">15 Nov 2024</td>
                                        <td data-label="Jenis">
                                            <span class="badge badge-primary">Mingguan</span>
                                        </td>
                                        <td data-label="Status">
                                            <span class="badge badge-success">Disetujui</span>
                                        </td>
                                        <td data-label="Pembimbing">Dr. Indira Sari, M.Pd</td>
                                        <td data-label="Aksi">
                                            <div class="action-buttons">
                                                <button class="action-btn action-btn-view" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="action-btn action-btn-edit" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="action-btn action-btn-delete" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="Judul Laporan">
                                            <div>
                                                <div style="font-weight: 600; color: var(--text-primary);">Laporan PKL
                                                    Minggu 2</div>
                                                <div style="font-size: 0.75rem; color: var(--text-secondary);">Analisis
                                                    sistem informasi
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Siswa">Siti Nurhaliza</td>
                                        <td data-label="Tanggal">08 Nov 2024</td>
                                        <td data-label="Jenis">
                                            <span class="badge badge-primary">Mingguan</span>
                                        </td>
                                        <td data-label="Status">
                                            <span class="badge badge-warning">Pending</span>
                                        </td>
                                        <td data-label="Pembimbing">Prof. Bambang Wijaya, M.T</td>
                                        <td data-label="Aksi">
                                            <div class="action-buttons">
                                                <button class="action-btn action-btn-view" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="action-btn action-btn-edit" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="action-btn action-btn-delete" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="Judul Laporan">
                                            <div>
                                                <div style="font-weight: 600; color: var(--text-primary);">Laporan PKL
                                                    Akhir</div>
                                                <div style="font-size: 0.75rem; color: var(--text-secondary);">Evaluasi
                                                    keseluruhan
                                                    kegiatan PKL</div>
                                            </div>
                                        </td>
                                        <td data-label="Siswa">Budi Santoso</td>
                                        <td data-label="Tanggal">01 Nov 2024</td>
                                        <td data-label="Jenis">
                                            <span class="badge badge-warning">Akhir</span>
                                        </td>
                                        <td data-label="Status">
                                            <span class="badge badge-success">Disetujui</span>
                                        </td>
                                        <td data-label="Pembimbing">Dr. Indira Sari, M.Pd</td>
                                        <td data-label="Aksi">
                                            <div class="action-buttons">
                                                <button class="action-btn action-btn-view" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="action-btn action-btn-edit" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="action-btn action-btn-delete" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection
