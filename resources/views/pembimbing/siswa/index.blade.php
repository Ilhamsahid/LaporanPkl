@extends('layouts.app')

@section('title', 'Siswa | SistemPKL')

@section('content')
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar', ['role' => 'pembimbing'])

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar', [
                    'judul' => 'Siswa',
                    'deskripsi' => 'Kelola siswa PKL yang anda bimbing',
                ])
            </header>

            <div class="content">
                <div id="siswa-bimbingan" class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header',[
                            'judul' => 'Siswa Bimbingan PKL',
                            'deskripsi' => 'Kelola siswa yang berada di bawah bimbingan anda',
                            'nama' => 'Siswa',
                            'name_modal' => 'siswa-modal'
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
        'updateRoute' => 'pembimbing.siswa.update',
        'destroyRoute' => 'admin.siswa.destroy',
    ])

    @include('js.modal-handler')
@endsection
