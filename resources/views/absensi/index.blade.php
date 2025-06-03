@extends('layouts.app')

@section('title', 'Absensi | Laporan PKL')

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
                        <h1 id="page-title">Absensi</h1>
                        <p class="header-subtitle" id="page-subtitle">Kelola Kehadiran Siswa PKL</p>
                    </div>
                </div>

                @include('components.navbar')
            </header>

            <!-- Content -->
            <div class="content">
                <div id="absensi" class="page-section active">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Absensi PKL</h3>
                                <p class="card-subtitle">Kelola kehadiran siswa PKL</p>
                            </div>
                            <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                                <div class="search-input">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="form-input" placeholder="Cari absensi..."
                                        style="width: 250px;">
                                </div>
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    <span>Input Absensi</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">Ahmad Rizki Pratama</div>
                                <span class="badge badge-success">Hadir</span>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Tanggal:</div>
                                    <div class="mobile-card-value">20 Nov 2024</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Jam Masuk:</div>
                                    <div class="mobile-card-value">08:00</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Jam Keluar:</div>
                                    <div class="mobile-card-value">16:00</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Tempat PKL:</div>
                                    <div class="mobile-card-value">PT. Teknologi Maju</div>
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
                                <div class="mobile-card-title">Siti Nurhaliza</div>
                                <span class="badge badge-warning">Izin</span>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Tanggal:</div>
                                    <div class="mobile-card-value">20 Nov 2024</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Jam Masuk:</div>
                                    <div class="mobile-card-value">-</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Jam Keluar:</div>
                                    <div class="mobile-card-value">-</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Keterangan:</div>
                                    <div class="mobile-card-value">Sakit</div>
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
                                        <th>Nama Siswa</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Tempat PKL</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Nama Siswa">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div
                                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                    AR</div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">Ahmad Rizki
                                                        Pratama</div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">XII RPL
                                                        1</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Tanggal">20 Nov 2024</td>
                                        <td data-label="Jam Masuk">08:00</td>
                                        <td data-label="Jam Keluar">16:00</td>
                                        <td data-label="Status">
                                            <span class="badge badge-success">Hadir</span>
                                        </td>
                                        <td data-label="Keterangan">-</td>
                                        <td data-label="Tempat PKL">PT. Teknologi Maju</td>
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
                                        <td data-label="Nama Siswa">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div
                                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #ec4899, #be185d); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                    SN</div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">Siti
                                                        Nurhaliza</div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">XII RPL
                                                        2</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Tanggal">20 Nov 2024</td>
                                        <td data-label="Jam Masuk">-</td>
                                        <td data-label="Jam Keluar">-</td>
                                        <td data-label="Status">
                                            <span class="badge badge-warning">Izin</span>
                                        </td>
                                        <td data-label="Keterangan">Sakit</td>
                                        <td data-label="Tempat PKL">CV. Digital Solutions</td>
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
                                        <td data-label="Nama Siswa">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div
                                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                    BS</div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">Budi Santoso
                                                    </div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">XII TKJ
                                                        1</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Tanggal">20 Nov 2024</td>
                                        <td data-label="Jam Masuk">08:15</td>
                                        <td data-label="Jam Keluar">16:00</td>
                                        <td data-label="Status">
                                            <span class="badge badge-warning">Terlambat</span>
                                        </td>
                                        <td data-label="Keterangan">Terlambat 15 menit</td>
                                        <td data-label="Tempat PKL">PT. Teknologi Maju</td>
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
                                        <td data-label="Nama Siswa">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div
                                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                    DF</div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">Dewi Fortuna
                                                    </div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">XII MM 1
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Tanggal">20 Nov 2024</td>
                                        <td data-label="Jam Masuk">08:00</td>
                                        <td data-label="Jam Keluar">16:00</td>
                                        <td data-label="Status">
                                            <span class="badge badge-success">Hadir</span>
                                        </td>
                                        <td data-label="Keterangan">-</td>
                                        <td data-label="Tempat PKL">PT. Media Kreatif</td>
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
