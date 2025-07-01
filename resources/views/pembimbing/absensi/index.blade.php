@extends('layouts.app')

@section('title', 'Absensi | SistemPKL')

@section('content')
    <div id="mobile-overlay" class="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar')

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar',[
                    'judul' => 'Absensi',
                    'deskripsi' => 'Kelola informasi absensi',
                ])
            </header>

            <div class="content">
                <div class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header', [
                            'judul' => 'Absensi PKL',
                            'deskripsi' => 'Kelola Absensi siswa PKL yang anda bimbing',
                            'nama' => 'Absensi',
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
        'storeRoute' => 'pembimbing.absensi.store',
        'updateRoute' => 'pembimbing.absensi.update',
        'destroyRoute' => 'pembimbing.absensi.destroy',
    ])

    @include('js.modal-handler')
@endsection