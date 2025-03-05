<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shopsmart') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/basket.svg') }}" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-700">
    <main class="container mx-auto">
        {{ $slot }}
    </main>

    @stack('scripts')
</body>

</html>
