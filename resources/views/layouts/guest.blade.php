<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="tw-scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate() !!}
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
    <livewire:scripts />
</head>

<body class="tw-font-sans tw-antialiased">
    <div class="tw-min-h-screen tw-bg-gray-100">
        @include('layouts.navigation')
        {{ $slot }}
        @if(!request()->routeIs('admin.*'))
        @include('layouts.footer')
        @endif
    </div>
</body>

</html>