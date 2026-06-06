<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'XO United')</title>
    <x-favicon />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('styles')
</head>
<body class="text-zinc-800 selection:bg-red-600 selection:text-white overflow-x-hidden antialiased">
    <x-header />
    @yield('content')
    <x-footer />
    @stack('scripts')
</body>
</html>
