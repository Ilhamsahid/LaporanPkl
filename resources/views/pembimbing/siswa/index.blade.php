@extends('layouts.app', ['role' => 'pembimbing'])

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
                        ])


                    </div>

                </div>
            </div>
        </main>
    </div>
@endsection
