@extends('layouts.app')

@section('title', 'TempatPKL | SistemPKL')

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
                        <h1 id="page-title">Data Tempat PKL</h1>
                        <p class="header-subtitle" id="page-subtitle">Kelola Informasi Tempat PKL</p>
                    </div>
                </div>

                @include('components.navbar')
            </header>

            <!-- Content -->
            <div class="content">

                <div id="tempat-pkl" class="page-section active">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Data Tempat PKL</h3>
                                <p class="card-subtitle">Kelola informasi perusahaan/instansi tempat PKL</p>
                            </div>
                            <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                                <div class="search-input">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="form-input" placeholder="Cari tempat PKL..."
                                        style="width: 250px;">
                                </div>
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    <span>Tambah Tempat PKL</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">PT. Teknologi Maju</div>
                                <div class="company-icon"
                                    style="background: linear-gradient(135deg, var(--primary-500), var(--primary-600));">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Alamat:</div>
                                    <div class="mobile-card-value">Jl. Raya Surabaya No. 123, Probolinggo</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Telepon:</div>
                                    <div class="mobile-card-value">(0335) 421234</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Email:</div>
                                    <div class="mobile-card-value">info@teknologimaju.com</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Siswa PKL:</div>
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

                        <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">CV. Digital Solutions</div>
                                <div class="company-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                                    <i class="fas fa-laptop-code"></i>
                                </div>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Alamat:</div>
                                    <div class="mobile-card-value">Jl. Brawijaya No. 45, Probolinggo</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Telepon:</div>
                                    <div class="mobile-card-value">(0335) 425678</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Email:</div>
                                    <div class="mobile-card-value">contact@digitalsolutions.co.id</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Siswa PKL:</div>
                                    <div class="mobile-card-value">5 siswa</div>
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
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Siswa PKL</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Nama Perusahaan">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div class="company-icon"
                                                    style="background: linear-gradient(135deg, var(--primary-500), var(--primary-600));">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">PT.
                                                        Teknologi Maju</div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">Software
                                                        Development
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Alamat">Jl. Raya Surabaya No. 123, Probolinggo</td>
                                        <td data-label="Telepon">(0335) 421234</td>
                                        <td data-label="Email">info@teknologimaju.com</td>
                                        <td data-label="Siswa PKL">
                                            <span class="badge badge-primary">8 siswa</span>
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
                                        <td data-label="Nama Perusahaan">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div class="company-icon"
                                                    style="background: linear-gradient(135deg, #10b981, #059669);">
                                                    <i class="fas fa-laptop-code"></i>
                                                </div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">CV. Digital
                                                        Solutions
                                                    </div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">Web
                                                        Development
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Alamat">Jl. Brawijaya No. 45, Probolinggo</td>
                                        <td data-label="Telepon">(0335) 425678</td>
                                        <td data-label="Email">contact@digitalsolutions.co.id</td>
                                        <td data-label="Siswa PKL">
                                            <span class="badge badge-success">5 siswa</span>
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
                                        <td data-label="Nama Perusahaan">
                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                <div class="company-icon"
                                                    style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                                                    <i class="fas fa-camera"></i>
                                                </div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">PT. Media
                                                        Kreatif</div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">
                                                        Multimedia & Design
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Alamat">Jl. Soekarno Hatta No. 78, Probolinggo</td>
                                        <td data-label="Telepon">(0335) 429876</td>
                                        <td data-label="Email">hello@mediakreatif.id</td>
                                        <td data-label="Siswa PKL">
                                            <span class="badge badge-warning">3 siswa</span>
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
