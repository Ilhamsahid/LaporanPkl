@extends('layouts.app')

@section('title', 'Absensi | Laporan PKL')

@section('content')
    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="mobile-overlay"></div>

    <div class="app-container">
        <!-- Sidebar -->
        @include('components.layouts.sidebar')

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                @include('components.layouts.navbar', [
                    'judul' => 'absensi',
                    'deskripsi' => 'Kelola Absensi Siswa PKL',
                ])
            </header>

            <!-- Content -->
            <div class="content">

                <div id="penilaian" class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header', [
                            'judul' => 'Absensi PKL',
                            'deskripsi' => 'Kelola Absensi siswa pkl',
                            'nama' => 'Absensi',
                            'name_modal' => 'absensi-modal',
                        ])

                        @php($tableVars = getTableVars('absensi.data-table-vars'))

                        <x-table.data-table
                        :rows="$absensis"
                        :mobileHeaders="$tableVars['mobileHeaders']"
                        :mobileFields="$tableVars['mobileFields']"
                        :mobileActions="$tableVars['mobileActions']"
                        :desktopColumns="$tableVars['desktopColumns']"
                        :desktopFields="$tableVars['desktopFields']"
                        :desktopActions="$tableVars['desktopActions']" />
                        @include('components.layouts.pagination', ['tables' => $absensis])
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('components.modals.modal-trigger', [
        'varName' => 'absensi',
        'items' => $absensis,
        'nama' => 'siswa.nama',
        'storeRoute' => 'admin.absensi.store',
        'updateRoute' => 'admin.absensi.update',
        'destroyRoute' => 'admin.absensi.destroy',
    ])

    @include('js.select-handler')
    @include('js.modal-handler')
@endsection