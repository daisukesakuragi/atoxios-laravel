<x-app-layout>
    <section class="tw-hero" style="background-image: url('{{ $member->profile_img_url }}');">
        <div class="tw-hero-overlay tw-bg-opacity-60 tw-pt-32 tw-pb-24 tw-backdrop-filter tw-backdrop-blur-md"></div>
        <div class="tw-hero-content tw-text-center tw-text-neutral-content tw-pt-32 tw-pb-24">
            <div class="tw-max-w-screen-sm">
                <div class="tw-avatar tw-mb-12">
                    <div class="tw-w-44 tw-h-44 tw-rounded-full tw-ring tw-ring-primary tw-ring-offset-base-100 tw-ring-offset-2">
                        <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" />
                    </div>
                </div>
                <h1 class="tw-text-4xl lg:tw-text-5xl tw-font-bold tw-mb-8">{{ $member->name }}</h1>
                <div class="tw-flex tw-justify-center tw-gap-x-8 tw-mb-12">
                    @if($member->facebook_url)
                    <a class="tw-cursor-pointer" href="{{ $member->facebook_url }}" target="_blank" rel="noopener">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-8 tw-h-8" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    @else
                    <span class="tw-cursor-not-allowed tw-opacity-50">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-8 tw-h-8" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </span>
                    @endif
                    @if($member->twitter_url)
                    <a class="tw-cursor-pointer" href="{{ $member->twitter_url }}" target="_blank" rel="noopener">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-8 tw-h-8" viewBox="0 0 24 24">
                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                        </svg>
                    </a>
                    @else
                    <span class="tw-cursor-not-allowed tw-opacity-50">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-8 tw-h-8" viewBox="0 0 24 24">
                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                        </svg>
                    </span>
                    @endif
                    @if($member->instagram_url)
                    <a class="tw-cursor-pointer" href="{{ $member->instagram_url }}" target="_blank" rel="noopener">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-8 tw-h-8" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                    </a>
                    @else
                    <span class="tw-cursor-not-allowed tw-opacity-50">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-8 tw-h-8" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                    </span>
                    @endif
                    @if($member->tiktok_url)
                    <a class="tw-cursor-pointer" href="{{ $member->tiktok_url }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="tw-w-8 tw-h-8" viewBox="0 0 16 16"> <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" fill="white"></path></svg>
                    </a>
                    @else
                    <span class="tw-cursor-not-allowed tw-opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="tw-w-8 tw-h-8" viewBox="0 0 16 16"> <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" fill="white"></path></svg>
                    </span>
                    @endif
                </div>
                <a href="#introduction" class="tw-btn tw-btn-primary tw-btn-block">{{ __('詳しくはこちら') }}</a>
            </div>
        </div>
    </section>
    <section id="introduction" class="tw-pt-24 tw-pb-12 tw-bg-base-100">
        <div class="tw-container tw-max-w-screen-sm">
            <x-section-title title="紹介" subtitle="INTRODUCTION"></x-section-title>
            <div class="tw-whitespace-pre-wrap">{{ $member->introduction }}</div>
        </div>
    </section>
    <section class="tw-py-12 tw-bg-base-100">
        <div class="tw-container tw-max-w-screen-sm">
            <x-section-title title="経歴" subtitle="CAREER"></x-section-title>
            <div class="tw-whitespace-pre-wrap">{{ $member->career }}</div>
        </div>
    </section>
    <section class="tw-py-12 tw-bg-base-100">
        <x-section-title title="企画一覧" subtitle="PLANS"></x-section-title>
        <div class="tw-container tw-max-w-screen-xl">
            @if(count($member->plans) > 0)
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($member->plans as $plan)
                <x-plan-card :plan="$plan"></x-plan-card>
                @endforeach
            </div>
            @else
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('企画のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @endif
        </div>
    </section>
</x-app-layout>