@extends('layouts.app')

@section('title', 'Pembimbing | SistemPKL')

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
                        <h1 id="page-title">Data Pembimbing</h1>
                        <p class="header-subtitle" id="page-subtitle">Kelola Informasi Pembimbing Pkl</p>
                    </div>
                </div>

                @include('components.navbar')
            </header>

            <!-- Content -->
            <div class="content">
                <div id="data-pembimbing" class="page-section active">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Data Pembimbing PKL</h3>
                                <p class="card-subtitle">Kelola informasi pembimbing PKL dari sekolah</p>
                            </div>
                            <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                                <div class="search-input">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="form-input" placeholder="Cari pembimbing..."
                                        style="width: 250px;">
                                </div>
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    <span>Tambah Pembimbing</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">Dr. Indira Sari, M.Pd</div>
                                <div
                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                    IS</div>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">NIP:</div>
                                    <div class="mobile-card-value">196801051993032001</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Email:</div>
                                    <div class="mobile-card-value">indira.sari@smkn1probolinggo.sch.id</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Telepon:</div>
                                    <div class="mobile-card-value">081234567800</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Jumlah Siswa:</div>
                                    <div class="mobile-card-value">12 siswa</div>
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
                                <div class="mobile-card-title">Prof. Bambang Wijaya, M.T</div>
                                <div
                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                    BW</div>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">NIP:</div>
                                    <div class="mobile-card-value">196505121990031002</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Email:</div>
                                    <div class="mobile-card-value">bambang.wijaya@smkn1probolinggo.sch.id</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Telepon:</div>
                                    <div class="mobile-card-value">081234567801</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Jumlah Siswa:</div>
                                    <div class="mobile-card-value">8 siswa</div>
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
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Jumlah Siswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Nama">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div
                                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                    IS</div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">Dr. Indira
                                                        Sari, M.Pd</div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">Guru
                                                        Produktif RPL</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="NIP">196801051993032001</td>
                                        <td data-label="Email">indira.sari@smkn1probolinggo.sch.id</td>
                                        <td data-label="Telepon">081234567800</td>
                                        <td data-label="Jumlah Siswa">
                                            <span class="badge badge-primary">12 siswa</span>
                                        </td>
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
                                        <td data-label="Nama">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div
                                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                    BW</div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">Prof.
                                                        Bambang Wijaya, M.T</div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">Guru
                                                        Produktif TKJ</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="NIP">196505121990031002</td>
                                        <td data-label="Email">bambang.wijaya@smkn1probolinggo.sch.id</td>
                                        <td data-label="Telepon">081234567801</td>
                                        <td data-label="Jumlah Siswa">
                                            <span class="badge badge-success">8 siswa</span>
                                        </td>
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
                                        <td data-label="Nama">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div
                                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                    AS</div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">Drs. Agus
                                                        Salim, M.Kom</div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">Guru
                                                        Produktif MM</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="NIP">197203151998021001</td>
                                        <td data-label="Email">agus.salim@smkn1probolinggo.sch.id</td>
                                        <td data-label="Telepon">081234567802</td>
                                        <td data-label="Jumlah Siswa">
                                            <span class="badge badge-warning">6 siswa</span>
                                        </td>
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
