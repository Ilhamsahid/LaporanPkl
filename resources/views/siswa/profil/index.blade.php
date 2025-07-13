@extends('layouts.app')

@section('title', 'Profil | SistemPKL')

@section('content')
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar')

        <main class="main-content">
            <header class="header">
                @include('components.layouts.navbar', [
                    'judul' => 'Profil Saya',
                    'deskripsi' => 'Informasi data siswa PKL',
                ])
            </header>
        </main>
    </div>
@endsection