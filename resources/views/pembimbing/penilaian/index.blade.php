@extends('layouts.app')

@section('title', 'Penilaian | SistemPKL')

@section('content')
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar')

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar', [
                    'judul' => 'Penilaian PKL',
                    'deskripsi' => 'Kelola Informasi Penilaian PKL',
                ])
            </header>

            <div class="content">

                <div class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header', [
                            'judul' => 'Penilaian PKL',
                            'deskripsi' => 'Kelola Penilaian PKL siswa yang anda bimbing',
                            'nama' => 'Penilaian',
                        ])

                        @php($tableVars = getTableVars('penilaian.data-table-vars'))

                        <x-table.data-table :rows="$penilaian" :mobileHeaders="$tableVars['mobileHeaders']" :mobileFields="$tableVars['mobileFields']" :mobileActions="$tableVars['mobileActions']"
                            :desktopColumns="$tableVars['desktopColumns']" :desktopFields="$tableVars['desktopFields']" :desktopActions="$tableVars['desktopActions']" />
                        @include('components.layouts.pagination', ['tables' => $penilaian])
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('components.modals.modal-trigger', [
        'varName' => 'penilaian',
        'items' => $penilaian,
        'nama' => 'nama',
        'storeRoute' => 'pembimbing.penilaian.store',
        'updateRoute' => 'pembimbing.penilaian.update',
        'destroyRoute' => 'pembimbing.penilaian.destroy',
    ])

    @include('js.modal-handler')
@endsection
