@php
    $theme = request()->cookie('theme', 'dark');
@endphp
<!DOCTYPE html>
<html lang="id" data-theme="{{ $theme }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')

    <script>
        document.documentElement.setAttribute(
            'data-theme',
            (document.cookie.match(/theme=(dark|light)/)?.[1] || 'dark')
        );
    </script>
</head>

<body >
    @yield('content')
</body>

</html>
