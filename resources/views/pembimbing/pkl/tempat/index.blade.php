@extends('layouts.app')

@section('title', 'TempatPKL | SistemPKL')

@section('content')
    <div id="mobile-overlay" class="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar')

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar', [
                    'judul' => 'Tempat PKL',
                    'deskripsi' => 'Kelola Tempat PKL Siswa yang anda bimbing',
                ])
            </header>

            <div class="content">
                <div class="page-section active">
                    <div class="card">
                        @include('components.layouts.page-header', [
                            'judul' => 'Data Tempat PKL',
                            'deskripsi' => 'Kelola informasi tempat pkl yang sedang melaksanakan PKL',
                            'nama' => 'tempat',
                        ])

                        @php($tableVars = getTableVars('tempat-pkl.data-table-vars'))

                        <x-table.data-table :rows="$tempatPkls" :mobileHeaders="$tableVars['mobileHeaders']" :mobileFields="$tableVars['mobileFields']" :mobileActions="$tableVars['mobileActions']"
                            :desktopColumns="$tableVars['desktopColumns']" :desktopFields="$tableVars['desktopFields']" :desktopActions="$tableVars['desktopActions']" />
                        @include('components.layouts.pagination', ['tables' => $tempatPkls])
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
