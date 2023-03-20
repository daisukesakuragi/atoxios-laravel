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
    @include('layouts.notification')
    <main class="tw-relative">
        <section class="tw-hero tw-bg-base-200">
            <div class="tw-hero-content tw-text-center tw-pt-32 tw-pb-24">
                <div class="tw-max-w-screen-sm">
                    <h1 class="tw-text-4xl lg:tw-text-5xl tw-font-bold tw-mb-8">{{ __('404 Not Found') }}</h1>
                    <p class="tw-mb-4 tw-text-left">{{ __('大変申し訳ございませんが、アクセスしていただいたページは見つかりませんでした。') }}</p>
                    <p class="tw-mb-8 tw-text-left">{{ __('お手数ですが、下記の「TOPに戻る」ボタンをクリックしていただき、TOPページにお戻りください。') }}</p>
                    <a href="{{ route('welcome') }}" class="tw-btn tw-btn-primary tw-btn-block">{{ __('TOPに戻る') }}</a>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
    @livewireScripts
</body>

</html>