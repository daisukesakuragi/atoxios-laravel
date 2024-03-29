<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="tw-scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="tw-font-sans tw-antialiased tw-bg-base-100 tw-relative">
    @include('layouts.navigation')
    <main class="tw-relative">
        <section class="tw-hero tw-bg-base-200">
            <div class="tw-hero-content tw-text-center tw-pt-32 tw-pb-24">
                <div class="tw-max-w-screen-sm">
                    <h1 class="tw-text-4xl lg:tw-text-5xl tw-font-bold tw-mb-8">{{ __('419 Page Expired') }}</h1>
                    <p class="tw-mb-4 tw-text-left">{{ __('アクセスしていただいたページの有効期限が切れてしまいました。') }}</p>
                    <p class="tw-text-left">{{ __('大変お手数ですが、ページをリロードしていただいてから、もう一度お試しください。') }}</p>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
    @livewireScripts
</body>

</html>