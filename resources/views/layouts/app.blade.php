<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="tw-scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate() !!}
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="tw-font-sans tw-antialiased tw-bg-base-100 tw-relative">
    @include('layouts.navigation')
    @include('layouts.notification')
    <main class="tw-relative">
        {{ $slot }}
    </main>
    @include('layouts.footer')
    @livewireScripts
    <script>
        function onClickBidButton() {
            audioElem = new Audio()
            audioElem.src = "/sounds/bid.wav"
            audioElem.play()
        }
    </script>
</body>

</html>