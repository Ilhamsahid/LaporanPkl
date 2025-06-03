@extends('layouts.app')

@section('title', 'Penilaian | SistemPKL')

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
                        <h1 id="page-title">Penilaian</h1>
                        <p class="header-subtitle" id="page-subtitle">Kelola Penilaian Siswa PKL</p>
                    </div>
                </div>

                @include('components.navbar')
            </header>

            <!-- Content -->
            <div class="content">

                <div id="penilaian" class="page-section active">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Penilaian PKL</h3>
                                <p class="card-subtitle">Kelola penilaian siswa PKL</p>
                            </div>
                            <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                                <div class="search-input">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="form-input" placeholder="Cari penilaian..."
                                        style="width: 250px;">
                                </div>
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    <span>Input Nilai</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">Ahmad Rizki Pratama</div>
                                <span class="badge badge-success">A</span>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Nilai Akhir:</div>
                                    <div class="mobile-card-value">88</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Kedisiplinan:</div>
                                    <div class="mobile-card-value">90</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Keterampilan:</div>
                                    <div class="mobile-card-value">85</div>
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
                                <div class="mobile-card-title">Siti Nurhaliza</div>
                                <span class="badge badge-success">A-</span>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Nilai Akhir:</div>
                                    <div class="mobile-card-value">82</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Kedisiplinan:</div>
                                    <div class="mobile-card-value">85</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Keterampilan:</div>
                                    <div class="mobile-card-value">80</div>
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
                                        <th>Nama Siswa</th>
                                        <th>Kedisiplinan</th>
                                        <th>Keterampilan</th>
                                        <th>Komunikasi</th>
                                        <th>Nilai Akhir</th>
                                        <th>Grade</th>
                                        <th>Pembimbing</th>
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
                                        <td data-label="Kedisiplinan">90</td>
                                        <td data-label="Keterampilan">85</td>
                                        <td data-label="Komunikasi">90</td>
                                        <td data-label="Nilai Akhir">
                                            <span style="font-weight: 700; color: var(--success-500);">88</span>
                                        </td>
                                        <td data-label="Grade">
                                            <span class="badge badge-success">A</span>
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
                                        <td data-label="Kedisiplinan">85</td>
                                        <td data-label="Keterampilan">80</td>
                                        <td data-label="Komunikasi">82</td>
                                        <td data-label="Nilai Akhir">
                                            <span style="font-weight: 700; color: var(--success-500);">82</span>
                                        </td>
                                        <td data-label="Grade">
                                            <span class="badge badge-success">A-</span>
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
                                        <td data-label="Kedisiplinan">88</td>
                                        <td data-label="Keterampilan">78</td>
                                        <td data-label="Komunikasi">75</td>
                                        <td data-label="Nilai Akhir">
                                            <span style="font-weight: 700; color: var(--warning-500);">80</span>
                                        </td>
                                        <td data-label="Grade">
                                            <span class="badge badge-warning">B+</span>
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
