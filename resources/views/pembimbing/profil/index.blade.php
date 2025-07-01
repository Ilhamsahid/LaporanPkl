@extends('layouts.app')

@section('title', 'Profil | SistemPKL')

@section('content')
    <div id="mobile-overlay" class="mobile-overlay"></div>

    <div class="app-container">
        @include('components.layouts.sidebar')

        <div class="main-content">
            <header class="header">
                @include('components.layouts.navbar',[
                    'judul' => 'Profil Saya',
                    'deskripsi' => 'Informasi Akun'
                ])
            </header>
        </div>
    </div>
@endsection