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

            <div class="content">
                <div class="page-section wrapper-page-section active">
                    <div class="card">
                        <div class="card-header">
                            @include('pembimbing.profil.header')
                        </div>
                        <div class="card-body">
                            @include('pembimbing.profil.body')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection