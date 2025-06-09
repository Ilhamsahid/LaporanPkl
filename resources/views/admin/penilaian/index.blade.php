@extends('layouts.app')

@section('title', 'Penilaian | SistemPKL')

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
                    'judul' => 'penilaian',
                    'deskripsi' => 'Kelola Penilaian Siswa',
                ])
            </header>

            <!-- Content -->
            <div class="content">

                <div id="penilaian" class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header', [
                            'judul' => 'Penilaian PKL',
                            'deskripsi' => 'Kelola Penilaian Siswa PKL',
                            'nama' => 'Nilai',
                            'name_modal' => 'penilaian-modal',
                        ])

                        @php($tableVars = getTableVars('penilaian.data-table-vars'))

                        <x-table.data-table
                        :rows="$penilaians"
                        :mobileHeaders="$tableVars['mobileHeaders']"
                        :mobileFields="$tableVars['mobileFields']"
                        :mobileActions="$tableVars['mobileActions']"
                        :desktopColumns="$tableVars['desktopColumns']"
                        :desktopFields="$tableVars['desktopFields']"
                        :desktopActions="$tableVars['desktopActions']" />
                        @include('components.layouts.pagination', ['tables' => $penilaians])
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('components.modals.modal-trigger', [
        'varName' => 'penilaian',
        'items' => $penilaians,
        'nama' => 'siswa.nama',
        'storeRoute' => 'admin.penilaian.store',
        'updateRoute' => 'admin.penilaian.update',
        'destroyRoute' => 'admin.penilaian.destroy',
    ])

    @include('js.select-handler')
    @include('js.modal-handler')
@endsection