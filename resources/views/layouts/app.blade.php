<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="tw-scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
    <livewire:scripts />
</head>

<body class="tw-font-sans tw-antialiased">
    <div class="tw-min-h-screen tw-bg-gray-100 tw-relative">
        @include('layouts.navigation')
        <main>
            {{ $slot }}
        </main>
        <footer id="contact" class="tw-py-24 tw-bg-gray-100">
            <div class="tw-container tw-max-w-screen-xl">
                <h2 class="tw-text-center tw-text-xl tw-mb-8">
                    <x-application-logo class="tw-w-20 tw-h-20 tw-fill-current tw-text-indigo-700 tw-mx-auto" />
                    <span class="tw-text-indigo-700">CONTACT</span>
                </h2>
            </div>
        </footer>
    </div>
</body>

</html>
