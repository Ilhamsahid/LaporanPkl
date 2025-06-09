@extends('layouts.app')

@section('title', 'Laporan | SistemPKL')

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
                @include('components.layouts.navbar',[
                    'judul' => 'Laporan PKL',
                    'deskripsi' => 'Kelola Informasi Laporan PKL',
                ])
            </header>

            <!-- Content -->
            <div class="content">

                <div id="laporan-pkl" class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header',[
                            'judul' => 'Laporan PKL',
                            'deskripsi' => 'Kelola Laporan PKL siswa',
                            'nama' => 'Laporan',
                            'name_modal' => 'laporan-modal',
                        ])

                        @php($tableVars = getTableVars('laporan.data-table-vars'))

                        <x-table.data-table
                        :rows="$laporans"
                        :mobileHeaders="$tableVars['mobileHeaders']"
                        :mobileFields="$tableVars['mobileFields']"
                        :mobileActions="$tableVars['mobileActions']"
                        :desktopColumns="$tableVars['desktopColumns']"
                        :desktopFields="$tableVars['desktopFields']"
                        :desktopActions="$tableVars['desktopActions']" />
                        @include('components.layouts.pagination', ['tables' => $laporans])
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('components.modals.modal-trigger', [
        'varName' => 'laporan',
        'items' => $laporans,
        'nama' => 'judul',
        'storeRoute' => 'admin.laporan.store',
        'updateRoute' => 'admin.laporan.update',
        'destroyRoute' => 'admin.laporan.destroy',
    ])

    @include('js.modal-handler')
@endsection