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
                                <button class="btn btn-primary" onclick="openModal('laporan-pkl-modal')">
                                    <i class="fas fa-plus"></i>
                                    <span>Tambah Laporan</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        @forelse ($laporans as $laporan)
                            <div class="mobile-card">
                                <div class="mobile-card-header">
                                    <div class="mobile-card-title">{{ $laporan->judul }}</div>
                                    <span class="badge badge-primary">{{ $laporan->jenis_laporan }}</span>
                                </div>
                                <div class="mobile-card-body">
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Siswa:</div>
                                        <div class="mobile-card-value">{{ $laporan->siswa->nama }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Tanggal:</div>
                                        <div class="mobile-card-value">1{{ $laporan->tanggal }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Pembimbing:</div>
                                        <div class="mobile-card-value">
                                            {{ optional($laporan->siswa->pembimbing)->nama ?? '-' }}</div>
                                    </div>
                                </div>
                                <div class="mobile-card-actions">
                                    <button class="action-btn action-btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-btn action-btn-edit" title="Edit"
                                        onclick="openModal('laporan-pkl-modal{{ $laporan->id }}', {{ $laporan->id }}, 'Edit')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-btn action-btn-delete" title="Hapus"
                                        onclick="openModal('delete-modal{{ $laporan->id }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @empty
                        @endforelse

                        <!-- Desktop Table View -->
                        <div class="table-container hidden-mobile">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Judul Laporan</th>
                                        <th>Siswa</th>
                                        <th>Tanggal</th>
                                        <th>Jenis</th>
                                        <th>Pembimbing</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laporans as $laporan)
                                        <tr>
                                            <td data-label="Judul Laporan">
                                                <div>
                                                    <div style="font-weight: 600; color: var(--text-primary);">
                                                        {{ $laporan->judul }}</div>
                                                    <div style="font-size: 0.75rem; color: var(--text-secondary);">
                                                        {{ $laporan->isi_laporan }}</div>
                                                </div>
                                            </td>
                                            <td data-label="Siswa">{{ $laporan->siswa->nama }}</td>
                                            <td data-label="Tanggal">{{ $laporan->tanggal }}</td>
                                            <td data-label="Jenis">
                                                <span class="badge badge-primary">{{ $laporan->jenis_laporan }}</span>
                                            </td>
                                            <td data-label="Pembimbing">
                                                {{ optional($laporan->siswa->pembimbing)->nama ?? '-' }}</td>
                                            <td data-label="Aksi">
                                                <div class="action-buttons">
                                                    <button class="action-btn action-btn-view" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-edit" title="Edit"
                                                        onclick="openModal('laporan-pkl-modal{{ $laporan->id }}', {{ $laporan->id }}, 'Edit')">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-delete" title="Hapus"
                                                        onclick="openModal('delete-modal{{ $laporan->id }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        @push('modal')
                                            @include('components.modals.laporan-modal', [
                                                'id' => $laporan->id,
                                                'laporan' => $laporan,
                                                'mode' => 'Edit',
                                                'route' => route('admin.laporan.update', $laporan->id),
                                            ])

                                            @include('components.modals.delete', [
                                                'id' => $laporan->id,
                                                'nama' => $laporan->judul,
                                                'route' => route('admin.laporan.destroy', $laporan->id),
                                            ])
                                        @endpush

                                    @empty
                                        <tr class="d-md-block">
                                            <td colspan="6"
                                                style="text-align:center; font-style: italic; color: var(--text-secondary);">
                                                Tidak ditemukan
                                            </td>
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
                                Menampilkan {{ $laporans->firstItem() }}-{{ $laporans->lastItem() }} dari
                                {{ $laporans->total() }}
                                data
                            </div>
                            <div class="pagination">
                                {{-- Tombol Previous --}}
                                <button class="pagination-btn" {{ $laporans->onFirstPage() ? 'disabled' : '' }}
                                    onclick="window.location='{{ $laporans->previousPageUrl() }}'">
                                    <i class="fas fa-chevron-left"></i>
                                </button>

                                {{-- Nomor Halaman --}}
                                @for ($i = 1; $i <= $laporans->lastPage(); $i++)
                                    <button class="pagination-btn {{ $laporans->currentPage() == $i ? 'active' : '' }}"
                                        onclick="window.location='{{ $laporans->url($i) }}'">
                                        {{ $i }}
                                    </button>
                                @endfor

                                {{-- Tombol Next --}}
                                <button class="pagination-btn" {{ !$laporans->hasMorePages() ? 'disabled' : '' }}
                                    onclick="window.location='{{ $laporans->nextPageUrl() }}'">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    @include('components.modals.laporan-modal', [
        'laporan' => '',
        'mode' => 'Tambah',
        'route' => route('admin.laporan.store') ?? '',
    ])

    @push('script')
        @if (session('modal-add'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modalId = "{{ session('modal-add') }}";
                    openModal(modalId);
                });
            </script>
        @endif

        @if (session('modal-edit'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modalId = "{{ session('modal-edit') }}";
                    openModal(modalId);
                });
            </script>
        @endif

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showNotification('success', 'Berhasil', '{{ session('success') }}');
                });
            </script>
        @endif
    @endpush

@endsection
