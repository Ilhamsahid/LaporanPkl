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
        </main>
    </div>
@endsection