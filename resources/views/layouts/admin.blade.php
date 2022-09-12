<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="tw-scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
    <livewire:scripts />
</head>

<body class="tw-font-sans tw-antialiased">
    <div class="tw-min-h-screen tw-bg-gray-100">
        @include('layouts.admin-navigation')
        @auth
        <!-- Page Heading -->
        <header class="tw-bg-white tw-shadow">
            <div class="tw-container tw-max-w-screen-xl tw-mx-auto tw-py-6 tw-px-4 sm:tw-px-6 lg:tw-px-8">
                {{ $header }}
            </div>
        </header>
        @endauth
        @if (session()->has('success'))
        <div class="tw-bg-green-500 tw-text-white tw-w-screen">
            <div class="tw-p-4 tw-container tw-max-w-screen-xl tw-flex tw-items-center tw-gap-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg><span class="tw-font-semibold tw-text-sm">{{ session()->get('success') }}</span>
            </div>
        </div>
        @elseif (session()->has('error'))
        <div class="tw-bg-red-600 tw-text-white tw-w-screen">
            <div class="tw-p-4 tw-container tw-max-w-screen-xl tw-flex tw-items-center tw-gap-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg><span class="tw-font-semibold tw-text-sm">{{ session()->get('error') }}</span>
            </div>
        </div>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>