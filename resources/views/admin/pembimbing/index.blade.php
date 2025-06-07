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
                                <button class="btn btn-primary" onclick="openModal('pembimbing-modal')">
                                    <i class="fas fa-plus"></i>
                                    <span>Tambah Pembimbing</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        @forelse ($pembimbings as $pembimbing)
                            <div class="mobile-card">
                                <div class="mobile-card-header">
                                    <div class="mobile-card-title">{{ $pembimbing->nama }}</div>
                                    <div
                                        style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                        {{ getInitials($pembimbing->nama) }}
                                    </div>
                                </div>
                                <div class="mobile-card-body">
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">NIP:</div>
                                        <div class="mobile-card-value">{{ optional($pembimbing)->nip ?? '-'}}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Email:</div>
                                        <div class="mobile-card-value">{{ $pembimbing->email }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Telepon:</div>
                                        <div class="mobile-card-value">{{ $pembimbing->telepon }}</div>
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
                                    <button class="action-btn action-btn-edit" title="Edit"
                                        onclick="openModal('pembimbing-modal{{ $pembimbing->id }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-btn action-btn-delete" title="Hapus"
                                        onclick="openModal('delete-modal{{ $pembimbing->id }}')">
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
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Jumlah Siswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pembimbings as $pembimbing)
                                        <tr>
                                            <td data-label="Nama">
                                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                    <div
                                                        style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                        {{ getInitials($pembimbing->nama) }}
                                                    </div>
                                                    <div>
                                                        <div style="font-weight: 600; color: var(--text-primary);">
                                                            {{ $pembimbing->nama }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="NIP">{{ optional($pembimbing)->nip ?? '-'}}</td>
                                            <td data-label="Email">{{ $pembimbing->email }}</td>
                                            <td data-label="Telepon">{{ $pembimbing->telepon }}</td>
                                            <td data-label="Jumlah Siswa">
                                                <span class="badge badge-warning">6 siswa</span>
                                            </td>
                                            <td data-label="Aksi">
                                                <div class="action-buttons">
                                                    <button class="action-btn action-btn-view" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-edit" title="Edit"
                                                        onclick="openModal('pembimbing-modal{{ $pembimbing->id }}')">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-delete" title="Hapus"
                                                        onclick="openModal('delete-modal{{ $pembimbing->id }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        @push('modal')
                                            @include('components.modals.pembimbing-modal', [
                                                'pembimbing' => $pembimbing,
                                                'id' => $pembimbing->id,
                                                'mode' => 'Edit',
                                                'route' => route('admin.pembimbing.update', $pembimbing->id) ?? '',
                                            ])

                                            @include('components.modals.delete', [
                                                'id' => $pembimbing->id,
                                                'nama' => $pembimbing->nama,
                                                'route' => route('admin.pembimbing.destroy', $pembimbing->id) ?? '',
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
                                Menampilkan {{ $pembimbings->firstItem() }}-{{ $pembimbings->lastItem() }} dari
                                {{ $pembimbings->total() }}
                                data
                            </div>
                            <div class="pagination">
                                {{-- Tombol Previous --}}
                                <button class="pagination-btn" {{ $pembimbings->onFirstPage() ? 'disabled' : '' }}
                                    onclick="window.location='{{ $pembimbings->previousPageUrl() }}'">
                                    <i class="fas fa-chevron-left"></i>
                                </button>

                                {{-- Nomor Halaman --}}
                                @for ($i = 1; $i <= $pembimbings->lastPage(); $i++)
                                    <button class="pagination-btn {{ $pembimbings->currentPage() == $i ? 'active' : '' }}"
                                        onclick="window.location='{{ $pembimbings->url($i) }}'">
                                        {{ $i }}
                                    </button>
                                @endfor

                                {{-- Tombol Next --}}
                                <button class="pagination-btn" {{ !$pembimbings->hasMorePages() ? 'disabled' : '' }}
                                    onclick="window.location='{{ $pembimbings->nextPageUrl() }}'">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>
    </div>

    @include('components.modals.pembimbing-modal', [
        'pembimbing' => '',
        'mode' => 'Tambah',
        'route' => route('admin.pembimbing.store') ?? '',
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
