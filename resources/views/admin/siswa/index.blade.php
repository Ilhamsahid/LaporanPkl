@extends('layouts.app')

@section('title', 'Siswa | SistemPKL')

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
                    'judul' => 'Siswa',
                    'deskripsi' => 'Kelola Informasi siswa PKL',
                ])
            </header>

            <!-- Content -->
            <div class="content">
                <div id="dashboard" class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header', [
                            'judul' => 'Data Siswa PKL',
                            'deskripsi' => 'Kelola informasi siswa yang sedang melaksanakan PKL',
                            'nama' => 'Siswa',
                            'name_modal' => 'siswa-modal',
                        ])

                        @php($tableVars = getTableVars('siswa.table-vars'))

                        <x-table.data-table
                        :rows="$siswas"
                        :mobileHeaders="$tableVars['mobileHeaders']"
                        :mobileFields="$tableVars['mobileFields']"
                        :mobileActions="$tableVars['mobileActions']"
                        :desktopColumns="$tableVars['desktopColumns']"
                        :desktopFields="$tableVars['desktopFields']"
                        :desktopActions="$tableVars['desktopActions']" />
                        @include('components.layouts.pagination', ['tables' => $siswas])
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('components.modals.modal-trigger', [
        'varName' => 'siswa',
        'items' => $siswas,
        'nama' => 'nama',
        'storeRoute' => 'admin.siswa.store',
        'updateRoute' => 'admin.siswa.update',
        'destroyRoute' => 'admin.siswa.destroy',
    ])

    @include('js.modal-handler')
@endsection
