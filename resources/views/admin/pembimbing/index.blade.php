@extends('layouts.app')

@section('title', 'Pembimbing | SistemPKL')

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
                    'judul' => 'Data Pembimbing',
                    'deskripsi' => 'Kelola Informasi Pembimbing Pkl',
                ])
            </header>

            <!-- Content -->
            <div class="content">
                <div id="data-pembimbing" class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header', [
                            'judul' => 'Data Pembimbing PKL',
                            'deskripsi' => 'Kelola informasi pembimbing PKL dari sekolah',
                            'nama' => 'Pembimbing',
                            'name_modal' => 'pembimbing-modal',
                        ])

                        @php($tableVars = getTableVars('pembimbing.data-table-vars'))

                        <x-table.data-table
                        :rows="$pembimbings"
                        :mobileHeaders="$tableVars['mobileHeaders']"
                        :mobileFields="$tableVars['mobileFields']"
                        :mobileAction="$tableVars['mobileActions']"
                        :desktopColumns="$tableVars['desktopColumns']"
                        :desktopFields="$tableVars['desktopFields']"
                        :desktopActions="$tableVars['desktopActions']" />
                        @include('components.layouts.pagination', ['tables' => $pembimbings])
                    </div>
        </main>
    </div>

    @include('components.modals.modal-trigger', [
        'varName' => 'pembimbing',
        'items' => $pembimbings,
        'nama' => 'nama',
        'storeRoute' => 'admin.pembimbing.store',
        'updateRoute' => 'admin.pembimbing.update',
        'destroyRoute' => 'admin.pembimbing.destroy',
    ])

    @include('js.modal-handler')
@endsection
