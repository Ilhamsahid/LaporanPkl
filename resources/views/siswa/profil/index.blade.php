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

            <div class="content">
                <div class="page-section wrapper-page-section-siswa active" style="margin-bottom: 80px">
                    <div class="card">
                        <div class="card-header">
                            @include('siswa.profil.header')
                        </div>
                        <div class="card-body">
                            @include('siswa.profil.body')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection