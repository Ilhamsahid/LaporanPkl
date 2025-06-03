@extends('layouts.app')

@section('title', 'Siswa | SistemPKL')

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
                        <h1 id="page-title">Siswa</h1>
                        <p class="header-subtitle" id="page-subtitle">Kelola informasi siswa PKL</p>
                    </div>
                </div>

                @include('components.navbar')
            </header>

            <!-- Content -->
            @php
                $id = 1;
            @endphp
            <div class="content">
                <div id="dashboard" class="page-section active">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Data Siswa PKL</h3>
                                <p class="card-subtitle">Kelola informasi siswa yang sedang melaksanakan PKL</p>
                            </div>
                            <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                                <div class="search-input">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="form-input" placeholder="Cari siswa..."
                                        style="width: 250px;">
                                </div>
                                <button class="btn btn-primary" onclick="openModal('siswa-modal')">
                                    <i class="fas fa-plus"></i>
                                    <span>Tambah Siswa</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">Ahmad Rizki Pratama</div>
                                <div
                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                    AR</div>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Email:</div>
                                    <div class="mobile-card-value">ahmad.rizki@student.smk.sch.id</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Telepon:</div>
                                    <div class="mobile-card-value">081234567890</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Pembimbing:</div>
                                    <div class="mobile-card-value">Dr. Indira Sari, M.Pd</div>
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
                                <button class="action-btn action-btn-edit" title="Edit"
                                    onclick="openModal('siswa-modal{{ $id }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn action-btn-delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">Ahmad Rizki Pratama</div>
                                <div
                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                    AR</div>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Email:</div>
                                    <div class="mobile-card-value">ahmad.rizki@student.smk.sch.id</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Telepon:</div>
                                    <div class="mobile-card-value">081234567890</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Pembimbing:</div>
                                    <div class="mobile-card-value">Dr. Indira Sari, M.Pd</div>
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
                                <button class="action-btn action-btn-edit" title="Edit"
                                    onclick="openModal('siswa-modal{{ $id }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn action-btn-delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">Ahmad Rizki Pratama</div>
                                <div
                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                    AR</div>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Email:</div>
                                    <div class="mobile-card-value">ahmad.rizki@student.smk.sch.id</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Telepon:</div>
                                    <div class="mobile-card-value">081234567890</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Pembimbing:</div>
                                    <div class="mobile-card-value">Dr. Indira Sari, M.Pd</div>
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
                                <button class="action-btn action-btn-edit" title="Edit"
                                    onclick="openModal('siswa-modal{{ $id }}')">
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
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Pembimbing</th>
                                        <th>Tempat PKL</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Nama">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div
                                                    style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                    AR</div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">Ahmad
                                                        Rizki Pratama</div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">XII
                                                        RPL 1</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Email">ahmad.rizki@student.smk.sch.id</td>
                                        <td data-label="Telepon">081234567890</td>
                                        <td data-label="Pembimbing">Dr. Indira Sari, M.Pd</td>
                                        <td data-label="Tempat PKL">PT. Teknologi Maju</td>
                                        <td data-label="Aksi">
                                            <div class="action-buttons">
                                                <button class="action-btn action-btn-view" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="action-btn action-btn-edit" title="Edit"
                                                    onclick="openModal('siswa-modal{{ $id }}')">
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
                        <div class="pagination-container">
                            <div class="pagination-info">
                                Menampilkan 1-10 dari 24 data
                            </div>
                            <div class="pagination">
                                <button class="pagination-btn" disabled>
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="pagination-btn active">1</button>
                                <button class="pagination-btn">2</button>
                                <button class="pagination-btn">3</button>
                                <button class="pagination-btn">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('components.modal.siswa', ['id' => ''])
    @include('components.modal.siswa', ['id' => $id, 'siswa' => 'ilham'])

    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection
