@extends('layouts.app')

@section('title', 'SMK Negeri 1 Probolinggo - Laporan PKL')

@push('styles')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .login-container {
            height: 100vh;
            display: flex;
        }

        .left-panel {
            background-color: #f8f9fa;
            flex: 1;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .right-panel {
            background: linear-gradient(135deg, #7c9bd9 0%, #5a7bc8 50%, #4a6bb5 100%);
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .school-header {
            display: flex;
            align-items: center;
            margin-bottom: 3rem;
            position: absolute;
            top: 2rem;
            left: 2rem;
        }

        .school-logo {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-weight: bold;
        }

        .school-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        .form-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 2rem;
            color: #333;
            position: relative;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #333, transparent);
        }

        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 0.75rem;
            margin-bottom: 1rem;
        }

        .form-control:focus {
            border-color: #7c4dff;
            box-shadow: 0 0 0 0.2rem rgba(124, 77, 255, 0.25);
        }

        .form-check {
            margin-bottom: 1rem;
        }

        .forgot-password {
            color: #dc3545;
            text-decoration: none;
            font-size: 0.9rem;
            float: right;
            margin-top: -2.5rem;
            margin-bottom: 1rem;
        }

        .forgot-password:hover {
            color: #c82333;
            text-decoration: underline;
        }

        .btn-login {
            background: linear-gradient(135deg, #7c4dff, #651fff);
            border: none;
            color: white;
            padding: 0.75rem;
            border-radius: 5px;
            font-weight: 500;
            width: 100%;
            margin-bottom: 2rem;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #651fff, #5e35b1);
            color: white;
        }

        .signup-text {
            text-align: center;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 1rem;
        }

        .signup-link {
            color: #dc3545;
            text-decoration: none;
        }

        .signup-link:hover {
            color: #c82333;
            text-decoration: underline;
        }

        .smk-logo {
            position: absolute;
            top: 2rem;
            right: 2rem;
            font-weight: bold;
            color: #4a6bb5;
        }

        .illustration {
            position: relative;
            width: 300px;
            height: 300px;
        }

        .desk-person {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 150px;
            background: linear-gradient(135deg, #fff, #f0f0f0);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .person-icon {
            width: 60px;
            height: 60px;
            background: #ffd54f;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        .floating-avatar {
            position: absolute;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #64b5f6, #42a5f5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            animation: float 3s ease-in-out infinite;
        }

        .avatar-1 {
            top: 20px;
            left: 50px;
            animation-delay: 0s;
        }

        .avatar-2 {
            top: 10px;
            right: 80px;
            animation-delay: 0.5s;
        }

        .avatar-3 {
            top: 80px;
            left: 20px;
            animation-delay: 1s;
        }

        .avatar-4 {
            top: 60px;
            right: 30px;
            animation-delay: 1.5s;
        }

        .avatar-5 {
            top: 120px;
            right: 100px;
            animation-delay: 2s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .connection-line {
            position: absolute;
            width: 2px;
            background: rgba(255, 255, 255, 0.3);
            transform-origin: bottom;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .left-panel,
            .right-panel {
                flex: none;
                height: 50vh;
            }

            .school-header {
                position: relative;
                top: 0;
                left: 0;
                margin-bottom: 1rem;
            }

            .right-panel {
                display: none;
            }

            .left-panel {
                height: 100vh;
            }
        }
    </style>
@endpush

@section('content')
    <div class="login-container">
        <!-- Left Panel - Login Form -->
        <div class="left-panel">
            <div class="school-header">
                <div class="school-logo">
                    <img src="{{ asset('images/smkLogo.png') }}" width="55px" height="55px" alt="" srcset="">
                </div>
                <div class="school-name">SMK NEGERI 1 PROBOLINGGO</div>
            </div>

            <div class="form-container">
                <h1 class="form-title">LAPORAN PKL</h1>

                <form action="{{ route('login.proses') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="nama" placeholder="Masukkan Nama"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan Password" required>
                    </div>

                    @if ($errors->has('login_error'))
                        <div class="text-danger mx-2 mt-4 mb-3" style="text-align: center">
                            {{ $errors->first('login_error') }}
                        </div>
                    @endif

                    <button type="submit" class="btn btn-login mt-3">Log In</button>
                </form>

                <div class="signup-text">
                    Don't have an account? <a href="#" class="signup-link">Sign up</a>
                </div>
            </div>
        </div>

        <!-- Right Panel - Illustration -->
        <div class="right-panel">
            <div class="smk-logo">
                <img src="{{ asset('images/logo.png') }}" width="233.53px" height="124.8px" srcset="">
            </div>

            <div class="illustration">
                <!-- Floating Avatars -->
                <div class="floating-avatar avatar-1">
                    <i class="fas fa-user"></i>
                </div>
                <div class="floating-avatar avatar-2">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="floating-avatar avatar-3">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="floating-avatar avatar-4">
                    <i class="fas fa-user-friends"></i>
                </div>
                <div class="floating-avatar avatar-5">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>

                <!-- Main Desk with Person -->
                <div class="desk-person">
                    <img src="{{ asset('images/avatar.png') }}" width="100px" height="100px" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
