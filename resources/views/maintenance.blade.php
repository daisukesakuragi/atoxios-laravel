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
    <main class="tw-relative">
        <section class="tw-pt-24 tw-pb-16">
            <div class="tw-container tw-max-w-screen-sm">
                <x-page-title title="メンテナンス中" subtitle="UNDERGOING MEINTENANCE"></x-page-title>
                <div class="tw-prose-sm lg:tw-prose">
                    <p>
                        {{ __('ただいまメンテナンスのため一時サービスを停止しております。') }}
                    </p>
                    <p>
                        {{ __('大変ご不便をおかけいたしますが、今しばらくお待ちください。') }}    
                    </p>
                </div>
            </div>
        </section>    
    </main>
</body>

</html>