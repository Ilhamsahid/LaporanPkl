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
                                <button class="btn btn-primary" onclick="openModal('absensi-modal')">
                                    <i class="fas fa-plus"></i>
                                    <span>Input Nilai</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        @forelse ($absensis as $absensi)
                            <div class="mobile-card">
                                <div class="mobile-card-header">
                                    <div class="mobile-card-title">{{ $absensi->siswa->nama }}</div>
                                    @if ($absensi->status == 'hadir')
                                        <span class="badge badge-success">{{ $absensi->status }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $absensi->status }}</span>
                                    @endif
                                </div>
                                <div class="mobile-card-body">
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Tanggal:</div>
                                        <div class="mobile-card-value">{{ $absensi->tanggal }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Jam Masuk:</div>
                                        <div class="mobile-card-value">
                                            {{ \Carbon\Carbon::parse($absensi->jam_masuk)->format('H:i') ?? '-' }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Jam Keluar:</div>
                                        <div class="mobile-card-value">
                                            {{ \Carbon\Carbon::parse($absensi->jam_keluar)->format('H:i') ?? '-' }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Tempat PKL:</div>
                                        <div class="mobile-card-value">{{ $absensi->siswa->tempatPkl->nama_tempat }}</div>
                                    </div>
                                </div>
                                <div class="mobile-card-actions">
                                    <button class="action-btn action-btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-btn action-btn-edit" title="Edit"
                                        onclick="openModal('absensi-modal{{ $absensi->id }}', {{ $absensi->id }}, 'Edit')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-btn action-btn-delete" title="Hapus"
                                        onclick="openDeleteModal('', {{ $absensi->id }}, '{{ addslashes($absensi->siswa->nama) }}')">
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
                                        <th>Nama Siswa</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Tempat pkl</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($absensis as $absensi)
                                        <tr>
                                            <td data-label="Nama Siswa">
                                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                    <div
                                                        style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                        BS</div>
                                                    <div>
                                                        <div style="font-weight: 600; color: var(--text-primary);">
                                                            {{ $absensi->siswa->nama }}
                                                        </div>
                                                        <div style="font-size: 0.75rem; color: var(--text-secondary);">
                                                            {{ $absensi->siswa->kelas->nama }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Etika">{{ $absensi->tanggal }}</td>
                                            <td data-label="Keterampilan">
                                                {{ \Carbon\Carbon::parse($absensi->jam_masuk)->format('H:i') ?? '-' }}</td>
                                            <td data-label="Komunikasi">
                                                {{ \Carbon\Carbon::parse($absensi->jam_keluar)->format('H:i') ?? '-' }}
                                            </td>
                                            @if ($absensi->status == 'hadir')
                                                <td>
                                                    <span class="badge badge-success">{{ $absensi->status }}</span>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-warning">{{ $absensi->status }}</span>
                                                </td>
                                            @endif
                                            <td data-label="Nilai Akhir">
                                                {{ $absensi->keterangan ?? '-' }}
                                            </td>
                                            <td data-label="Pembimbing">{{ $absensi->siswa->tempatPkl->nama_tempat }}</td>
                                            <td data-label="Aksi">
                                                <div class="action-buttons">
                                                    <button class="action-btn action-btn-view" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-edit" title="Edit"
                                                        onclick="openModal('absensi-modal{{ $absensi->id }}', {{ $absensi->id }}, 'Edit')">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-delete" title="Hapus"
                                                        onclick="openDeleteModal('', {{ $absensi->id }}, '{{ addslashes($absensi->siswa->nama) }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        @push('modal')
                                            @include('components.modal.absensi', [
                                                'id' => $absensi->id,
                                                'absensi' => $absensi,
                                                'mode' => 'Edit',
                                                'route' => route('absensi.update', $absensi->id),
                                            ])

                                            @include('components.modal.delete', [
                                                'route' => route('absensi.destroy', $absensi->id),
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
                                Menampilkan {{ $absensis->firstItem() }}-{{ $absensis->lastItem() }} dari
                                {{ $absensis->total() }}
                                data
                            </div>
                            <div class="pagination">
                                {{-- Tombol Previous --}}
                                <button class="pagination-btn" {{ $absensis->onFirstPage() ? 'disabled' : '' }}
                                    onclick="window.location='{{ $absensis->previousPageUrl() }}'">
                                    <i class="fas fa-chevron-left"></i>
                                </button>

                                {{-- Nomor Halaman --}}
                                @for ($i = 1; $i <= $absensis->lastPage(); $i++)
                                    <button class="pagination-btn {{ $absensis->currentPage() == $i ? 'active' : '' }}"
                                        onclick="window.location='{{ $absensis->url($i) }}'">
                                        {{ $i }}
                                    </button>
                                @endfor

                                {{-- Tombol Next --}}
                                <button class="pagination-btn" {{ !$absensis->hasMorePages() ? 'disabled' : '' }}
                                    onclick="window.location='{{ $absensis->nextPageUrl() }}'">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </main>
    </div>
    @include('components.modal.absensi', [
        'absensi' => '',
        'mode' => 'Tambah',
        'route' => route('absensi.store'),
    ])

    <script>
        document.getElementById('kelas-select').addEventListener('change', function() {
            const kelasId = this.value;
            const siswaSelect = document.getElementById('siswa-select');

            // Reset pilihan siswa dulu
            siswaSelect.innerHTML = '<option value="" hidden>Pilih Siswa</option>';

            if (!kelasId) return;

            fetch(`/kelas/${kelasId}/siswa`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(siswa => {
                        const option = document.createElement('option');
                        option.value = siswa.id;
                        option.textContent = siswa.nama; // Asumsi atribut nama ada
                        siswaSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching siswa:', error);
                });
        });
    </script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showNotification('success', 'Berhasil', '{{ session('success') }}');
            });
        </script>
    @endif
    <script src="{{ asset('assets/js/script.js') }}"></script>

@endsection
