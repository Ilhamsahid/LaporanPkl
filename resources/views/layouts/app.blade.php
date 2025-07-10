@php
    $theme = request()->cookie('theme', 'dark');
@endphp
<!DOCTYPE html>
<html lang="id" data-theme="{{ $theme }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style-' . $role . '.css') }}">
    @stack('styles')
    @livewireStyles

    <script>
        document.documentElement.setAttribute(
            'data-theme',
            (document.cookie.match(/theme=(dark|light)/)?.[1] || 'dark')
        );
    </script>
</head>

<body>

    <!-- Notification Container -->
    <div id="notification-container" class="notification-container"></div>

    <!-- Loading Overlay -->
    <div id="loading-overlay" class="loading-overlay">
        <div class="loading-spinner"></div>
    </div>
    @yield('content')

    @include('components.mobile.bottom-nav')

    <script src="{{ asset('assets/js/script.js') }}"></script>

    @stack('modal')

    @stack('script')
    @livewireScripts
</body>

</html>
