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
                                <button class="btn btn-primary" onclick="openModal('penilaian-modal')">
                                    <i class="fas fa-plus"></i>
                                    <span>Input Nilai</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Cards View -->
                        @forelse ($penilaians as $penilaian)
                            <div class="mobile-card">
                                <div class="mobile-card-header">
                                    <div class="mobile-card-title">{{ $penilaian->siswa->nama }}</div>
                                    <span class="badge badge-success">A</span>
                                </div>
                                <div class="mobile-card-body">
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Nilai Akhir:</div>
                                        <div class="mobile-card-value">{{ $rataRata[$penilaian->id] }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Etika:</div>
                                        <div class="mobile-card-value">{{ $penilaian->nilai_etika }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Kedisplinan:</div>
                                        <div class="mobile-card-value">{{ $penilaian->nilai_kedisplinan }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Keterampilan:</div>
                                        <div class="mobile-card-value">{{ $penilaian->nilai_keterampilan }}</div>
                                    </div>
                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Wawasan:</div>
                                        <div class="mobile-card-value">{{ $penilaian->nilai_wawasan }}</div>
                                    </div>

                                    <div class="mobile-card-item">
                                        <div class="mobile-card-label">Pembimbing:</div>
                                        <div class="mobile-card-value">{{ $penilaian->siswa->pembimbing->nama }}</div>
                                    </div>
                                </div>
                                <div class="mobile-card-actions">
                                    <button class="action-btn action-btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-btn action-btn-edit" title="Edit"
                                        onclick="openModal('penilaian-modal{{ $penilaian->id }}', {{ $penilaian->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-btn action-btn-delete" title="Hapus"
                                        onclick="openDeleteModal('', {{ $penilaian->id }}, '{{ addslashes($penilaian->siswa->nama) }}')">
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
                                        <th>Etika</th>
                                        <th>Kedisiplinan</th>
                                        <th>Keterampilan</th>
                                        <th>Wawasan</th>
                                        <th>Nilai Akhir</th>
                                        <th>Pembimbing</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penilaians as $penilaian)
                                        <tr>
                                            <td data-label="Nama Siswa">
                                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                    <div
                                                        style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                                        {{ getInitials($penilaian->siswa->nama) }}
                                                    </div>
                                                    <div>
                                                        <div style="font-weight: 600; color: var(--text-primary);">
                                                            {{ $penilaian->siswa->nama }}
                                                        </div>
                                                        <div style="font-size: 0.75rem; color: var(--text-secondary);">
                                                            {{ $penilaian->siswa->kelas->nama }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Etika">{{ $penilaian->nilai_etika }}</td>
                                            <td data-label="Keterampilan">{{ $penilaian->nilai_kedisplinan }}</td>
                                            <td data-label="Komunikasi">{{ $penilaian->nilai_keterampilan }}</td>
                                            <td data-label="wawasan">{{ $penilaian->nilai_wawasan }}</td>
                                            <td data-label="Nilai Akhir">
                                                <span
                                                    style="font-weight: 700; color: var(--{{ $color[$penilaian->id] }}-500);">{{ $rataRata[$penilaian->id] }}</span>
                                            </td>
                                            <td data-label="Pembimbing">{{ $penilaian->siswa->pembimbing->nama }}</td>
                                            <td data-label="Aksi">
                                                <div class="action-buttons">
                                                    <button class="action-btn action-btn-view" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-edit" title="Edit"
                                                        onclick="openModal('penilaian-modal{{ $penilaian->id }}', {{ $penilaian->id }}, 'Edit')">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-delete" title="Hapus"
                                                        onclick="openDeleteModal('', {{ $penilaian->id }}, '{{ addslashes($penilaian->siswa->nama) }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        @push('modal')
                                            @include('components.modals.penilaian-modal', [
                                                'id' => $penilaian->id,
                                                'penilaian' => $penilaian,
                                                'mode' => 'Edit',
                                                'route' => route('admin.penilaian.update', $penilaian->id),
                                            ])

                                            @include('components.modals.delete', [
                                                'route' => route('admin.penilaian.destroy', $penilaian->id),
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
                                Menampilkan {{ $penilaians->firstItem() }}-{{ $penilaians->lastItem() }} dari
                                {{ $penilaians->total() }}
                                data
                            </div>
                            <div class="pagination">
                                {{-- Tombol Previous --}}
                                <button class="pagination-btn" {{ $penilaians->onFirstPage() ? 'disabled' : '' }}
                                    onclick="window.location='{{ $penilaians->previousPageUrl() }}'">
                                    <i class="fas fa-chevron-left"></i>
                                </button>

                                {{-- Nomor Halaman --}}
                                @for ($i = 1; $i <= $penilaians->lastPage(); $i++)
                                    <button class="pagination-btn {{ $penilaians->currentPage() == $i ? 'active' : '' }}"
                                        onclick="window.location='{{ $penilaians->url($i) }}'">
                                        {{ $i }}
                                    </button>
                                @endfor

                                {{-- Tombol Next --}}
                                <button class="pagination-btn" {{ !$penilaians->hasMorePages() ? 'disabled' : '' }}
                                    onclick="window.location='{{ $penilaians->nextPageUrl() }}'">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </main>
    </div>

    @include('components.modals.penilaian-modal', [
        'penilaian' => '',
        'mode' => 'Tambah',
        'route' => route('admin.penilaian.store'),
    ])

    <script>
        document.getElementById('kelas-select').addEventListener('change', function() {
            const kelasId = this.value;
            const siswaSelect = document.getElementById('siswa-select');

            // Reset pilihan siswa dulu
            siswaSelect.innerHTML = '<option value="" hidden>Pilih Siswa</option>';

            if (!kelasId) return;

            fetch(`/admin/kelas/${kelasId}/siswa`)
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
