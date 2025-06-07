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
                                <button class="btn btn-primary" onclick="openModal('tempat-pkl-modal')">
                                    <i class="fas fa-plus"></i>
                                    <span>Tambah Tempat PKL</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        @forelse ($tempatPkls as $tempatPkl)
                            <div class="mobile-card">
                            <div class="mobile-card-header">
                                <div class="mobile-card-title">{{ $tempatPkl->nama_tempat }}</div>
                                <div class="company-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                                    <i class="fas fa-laptop-code"></i>
                                </div>
                            </div>
                            <div class="mobile-card-body">
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Alamat:</div>
                                    <div class="mobile-card-value">{{ $tempatPkl->alamat }}</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Telepon:</div>
                                    <div class="mobile-card-value">{{ $tempatPkl->telepon }}</div>
                                </div>
                                <div class="mobile-card-item">
                                    <div class="mobile-card-label">Email:</div>
                                    <div class="mobile-card-value">{{ $tempatPkl->email }}</div>
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
                                <button class="action-btn action-btn-edit" title="Edit" onclick="openModal('tempat-pkl-modal{{ $tempatPkl->id }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn action-btn-delete" title="Hapus" onclick="openModal('delete-modal{{ $tempatPkl->id }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        @empty
                            <div class="d-md-none"
                                style="text-align:center; font-style: italic; color: var(--text-secondary);">
                                Tidak ditemukan
                            </div>
                        @endforelse

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
                                    @forelse ($tempatPkls as $tempatPkl)
                                        <tr>
                                            <td data-label="Nama Perusahaan">
                                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                    <div class="company-icon"
                                                        style="background: linear-gradient(135deg, var(--primary-500), var(--primary-600));">
                                                        <i class="fas fa-building"></i>
                                                    </div>
                                                    <div>
                                                        <div style="font-weight: 600; color: var(--text-primary);">
                                                            {{ $tempatPkl->nama_tempat }}</div>
                                                        <div style="font-size: 0.75rem; color: var(--text-secondary);">
                                                            {{ $tempatPkl->bidang  }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Alamat">{{ $tempatPkl->alamat }}</td>
                                            <td data-label="Telepon">{{ $tempatPkl->telepon }}</td>
                                            <td data-label="Email">{{ $tempatPkl->email }}</td>
                                            <td data-label="Siswa PKL">
                                                <span class="badge badge-primary">8 siswa</span>
                                            </td>
                                            <td data-label="Aksi">
                                                <div class="action-buttons">
                                                    <button class="action-btn action-btn-view" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-edit" title="Edit" onclick="openModal('tempat-pkl-modal{{ $tempatPkl->id }}')">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-delete" title="Hapus"
                                                    onclick="openModal('delete-modal{{ $tempatPkl->id }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @push('modal')
                                            @include('components.modals.tempat-modal', [
                                                'id' => $tempatPkl->id,
                                                'tempatPkl' => $tempatPkl,
                                                'mode' => 'Edit',
                                                'route' => route('admin.pkl.update', $tempatPkl->id) ?? ''
                                            ])

                                            @include('components.modals.delete', [
                                                'id' => $tempatPkl->id,
                                                'nama' => $tempatPkl->nama_tempat,
                                                'route' => route('admin.pkl.destroy', $tempatPkl->id) ?? '',
                                            ])
                                        @endpush
                                    @empty
                                        <tr class="d-md-block">
                                            <td colspan="6"
                                                style="text-align:center; font-style: italic; color: var(--text-secondary);">
                                                Tidak ditemukan
                                            </td>
                                        </tr>
                                    @endforelse
                                    <tr class="no-results-message" style="display:none;">
                                        <td colspan="6"
                                            style="text-align:center; font-style: italic; color: var(--text-secondary);">
                                            Tidak ditemukan
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-container">
                            <div class="pagination-info">
                                Menampilkan {{ $tempatPkls->firstItem() }}-{{ $tempatPkls->lastItem() }} dari
                                {{ $tempatPkls->total() }}
                                data
                            </div>
                            <div class="pagination">
                                {{-- Tombol Previous --}}
                                <button class="pagination-btn" {{ $tempatPkls->onFirstPage() ? 'disabled' : '' }}
                                    onclick="window.location='{{ $tempatPkls->previousPageUrl() }}'">
                                    <i class="fas fa-chevron-left"></i>
                                </button>

                                {{-- Nomor Halaman --}}
                                @for ($i = 1; $i <= $tempatPkls->lastPage(); $i++)
                                    <button class="pagination-btn {{ $tempatPkls->currentPage() == $i ? 'active' : '' }}"
                                        onclick="window.location='{{ $tempatPkls->url($i) }}'">
                                        {{ $i }}
                                    </button>
                                @endfor

                                {{-- Tombol Next --}}
                                <button class="pagination-btn" {{ !$tempatPkls->hasMorePages() ? 'disabled' : '' }}
                                    onclick="window.location='{{ $tempatPkls->nextPageUrl() }}'">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </main>
    </div>

    @include('components.modals.tempat-modal', [
        'tempatPkl' => '',
        'mode' => 'Tambah',
        'route' => route('admin.pkl.store') ?? ''
    ])

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showNotification('success', 'Berhasil', '{{ session('success') }}');
            });
        </script>
    @endif
    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection
