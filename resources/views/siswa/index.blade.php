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
                        @forelse ($siswas as $siswa)
                            <div class="mobile-card">
                                <div class="mobile-card-header">
                                    <div class="mobile-card-title">{{ $siswa->nama }}</div>
                                    <div
                                        style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                        AR</div>
                                </div>
                                <div class="mobile-card-body">
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Email:</div>
                                        <div class="mobile-card-value">{{ $siswa->email }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Telepon:</div>
                                        <div class="mobile-card-value">{{ $siswa->telepon }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Pembimbing:</div>
                                        <div class="mobile-card-value">{{ $siswa->pembimbing->nama }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Tempat PKL:</div>
                                        <div class="mobile-card-value">{{ $siswa->tempatPkl->nama_tempat }}</div>
                                    </div>
                                </div>
                                <div class="mobile-card-actions">
                                    <button class="action-btn action-btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-btn action-btn-edit" title="Edit"
                                        onclick="openModal('siswa-modal{{ $siswa->id }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-btn action-btn-delete" title="Hapus"
                                        onclick="openDeleteModal('siswa', {{ $siswa->id }}, '{{ addslashes($siswa->nama) }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                            @push('modal')
                                @include('components.modal.siswa', [
                                    'id' => $siswa->id,
                                    'siswa' => $siswa,
                                    'mode' => 'Edit',
                                    'route' => route('siswa.update', $siswa->id) ?? '',
                                ])
                                @include('components.modal.delete', ['siswa' => $siswa])
                            @endpush

                            @empty
                                <div style="max-width: 300px; margin: 0 auto;">
                                    <p class="text-muted fst-italic">Belum ada data siswa PKL</p>
                                </div>
                            @endforelse

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
                                        @forelse ($siswas as $siswa)
                                            <tr>
                                                <td data-label="Nama">
                                                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                        <div
                                                            style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, var(--primary-500), var(--primary-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                            AR</div>
                                                        <div>
                                                            <div style="font-weight: 600; color: var(--text-primary);">
                                                                {{ $siswa->nama }}</div>
                                                            <div style="font-size: 0.75rem; color: var(--text-secondary);">
                                                                {{ $siswa->kelas->nama }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-label="Email">{{ $siswa->email }}</td>
                                                <td data-label="Telepon">{{ $siswa->telepon }}</td>
                                                <td data-label="Pembimbing">{{ $siswa->pembimbing->nama }}</td>
                                                <td data-label="Tempat PKL">{{ $siswa->tempatPkl->nama_tempat }}</td>
                                                <td data-label="Aksi">
                                                    <div class="action-buttons">
                                                        <button class="action-btn action-btn-view" title="Lihat Detail">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="action-btn action-btn-edit" title="Edit"
                                                            onclick="openModal('siswa-modal{{ $siswa->id }}')">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="action-btn action-btn-delete" title="Hapus"
                                                            onclick="openDeleteModal('siswa', {{ $siswa->id }}, '{{ addslashes($siswa->nama) }}')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            @push('modal')
                                                @include('components.modal.siswa', [
                                                    'id' => $siswa->id,
                                                    'siswa' => $siswa,
                                                    'mode' => 'Edit',
                                                    'route' => route('siswa.update', $siswa->id),
                                                ])
                                                @include('components.modal.delete', ['siswa' => $siswa])
                                            @endpush



                                        @empty
                                            <div style="max-width: 300px; margin: 0 auto;">
                                                <p class="text-muted fst-italic">Belum ada data siswa PKL</p>
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-container">
                                <div class="pagination-info">
                                    Menampilkan {{ $siswas->firstItem() }}-{{ $siswas->lastItem() }} dari
                                    {{ $siswas->total() }}
                                    data
                                </div>
                                <div class="pagination">
                                    {{-- Tombol Previous --}}
                                    <button class="pagination-btn" {{ $siswas->onFirstPage() ? 'disabled' : '' }}
                                        onclick="window.location='{{ $siswas->previousPageUrl() }}'">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>

                                    {{-- Nomor Halaman --}}
                                    @for ($i = 1; $i <= $siswas->lastPage(); $i++)
                                        <button class="pagination-btn {{ $siswas->currentPage() == $i ? 'active' : '' }}"
                                            onclick="window.location='{{ $siswas->url($i) }}'">
                                            {{ $i }}
                                        </button>
                                    @endfor

                                    {{-- Tombol Next --}}
                                    <button class="pagination-btn" {{ !$siswas->hasMorePages() ? 'disabled' : '' }}
                                        onclick="window.location='{{ $siswas->nextPageUrl() }}'">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @include('components.modal.siswa', [
            'siswa' => '',
            'mode' => 'Tambah',
            'route' => route('siswa.store') ?? '',
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
