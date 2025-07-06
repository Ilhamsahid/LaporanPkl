@extends('layouts.app')

@section('title', 'Laporan | SistemPKL')

@section('content')
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar')

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar', [
                    'judul' => 'Laporan PKL',
                    'deskripsi' => 'Kelola Laporan Kegiatan PKL',
                ])
            </header>

            <div class="content">
                <div id="laporan" class="page-section active wrapper-page-section-siswa">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Laporan PKL</h3>
                                <p class="card-subtitle">Kelola laporan kegiatan PKL</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Form Laporan -->
                            @include('siswa.pkl.laporan.create')

                            <!-- Daftar Laporan -->
                            <div id="daftar-laporan">
                                <h4
                                    style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; justify-content: space-between;">
                                    <span style="display: flex; align-items: center; gap: 0.5rem;">
                                        <i class="fas fa-file-alt" style="color: var(--primary-500);"></i>
                                        Laporan Saya
                                    </span>
                                </h4>
                                <div class="data-list" id="reports-list"></div>
                                <div id="pagination-container" class="pagination-container"></div>
                            </div>
                        </div>
                    </div>
                    @include('siswa.pkl.laporan.modal-detail')

                    <!-- Floating Action Button for mobile -->
                    <button class="fab" onclick="buatLaporan()" id="fab-laporan" style="display: none">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </main>
    </div>
    <!-- Modal Hapus Dinamis -->
    <div id="delete-modal" class="modal">
        <div class="modal-content" style="max-width: 400px;">
            <div class="modal-header">
                <h3 class="modal-title">Konfirmasi Hapus</h3>
                <button class="modal-close" onclick="closeDeleteModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" id="delete-modal-body">
                <!-- akan diisi lewat JS -->
            </div>
            <div class="modal-footer" id="delete-modal-footer">
                <!-- akan diisi lewat JS -->
            </div>
        </div>
    </div>

    @push('script')
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                setTimeout(() => {
                    const fab = document.getElementById('fab-laporan');
                    fab.style.display = 'flex';
                    requestAnimationFrame(() => {
                        fab.classList.add('show');
                    });
                }, 500); // 1000 ms = 1 detik
            });
        </script>
    @endpush
@endsection
