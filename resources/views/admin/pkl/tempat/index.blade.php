@extends('layouts.app')

@section('title', 'TempatPKL | SistemPKL')

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
                    'judul' => 'Data Tempat PKL',
                    'deskripsi' => 'Kelola Informasi Tempat PKL',
                ])
            </header>

            <!-- Content -->
            <div class="content">

                <div id="tempat-pkl" class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header',[
                            'judul' => 'Data Tempat PKL',
                            'deskripsi' => 'Kelola informasi perusahaan/instansi tempat PKL',
                            'name_modal' => 'tempatPkl-modal',
                            'nama' => 'Tempat PKL',
                        ])

                        @php($tableVars = getTableVars('tempat-pkl.data-table-vars'))

                        <x-table.data-table
                        :rows="$tempatPkls"
                        :mobileHeaders="$tableVars['mobileHeaders']"
                        :mobileFields="$tableVars['mobileFields']"
                        :mobileActions="$tableVars['mobileActions']"
                        :desktopColumns="$tableVars['desktopColumns']"
                        :desktopFields="$tableVars['desktopFields']"
                        :desktopActions="$tableVars['desktopActions']" />
                        @include('components.layouts.pagination', ['tables' => $tempatPkls])
                    </div>
                </div>

            </div>
        </main>
    </div>

    @include('components.modals.modal-trigger',[
        'varName' => 'tempatPkl',
        'items' => $tempatPkls,
        'nama' => 'nama_tempat',
        'storeRoute' => 'admin.pkl.store',
        'updateRoute' => 'admin.pkl.update',
        'destroyRoute' => 'admin.pkl.destroy',
    ])

    @include('js.modal-handler')
@endsection