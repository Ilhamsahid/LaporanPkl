@extends('layouts.app')

@section('title', 'Laporan | SistemPKL')

@section('content')
    <div class="mobile-overlay" id="mobile-overlay"></div> 

    <div class="app-container">
        @include('components.layouts.sidebar')

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar',[
                    'judul' => 'Laporan PKL',
                    'deskripsi' => 'Kelola Informasi Laporan PKL',
                ])
            </header>

            <div class="content">

                <div class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header',[
                            'judul' => 'Laporan PKL',
                            'deskripsi' => 'Kelola Laporan PKL siswa yang anda bimbing',
                            'nama' => 'Laporan',
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

    @include('js.modal-handler')
@endsection