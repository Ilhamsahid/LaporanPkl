@extends('layouts.app')

@section('title', 'Absensi | SistemPKL')

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
                <div id="absensi" class="page-section active wrapper-page-section-siswa" style="margin-bottom: 80px">
                    <livewire:siswa.absensi >
                </div>
                <livewire:siswa.modal-absensi>
            </div>
        </main>
    </div>
@endsection