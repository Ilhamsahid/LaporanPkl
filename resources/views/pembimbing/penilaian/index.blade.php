@extends('layouts.app')

@section('title', 'Penilaian | SistemPKL')

@section('content')
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar')

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar',[
                    'judul' => 'Penilaian PKL',
                    'deskripsi' => 'Kelola Informasi Penilaian PKL'
                ])
            </header>
        </main>
    </div>
@endsection