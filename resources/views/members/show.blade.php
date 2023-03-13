<x-app-layout>
    <section class="tw-py-12 tw-bg-base-100">        
            <div class="tw-text-center">
                <div class="tw-avatar tw-mb-10">
                    <div class="tw-w-full tw-max-w-xs tw-rounded-full tw-ring tw-ring-primary tw-ring-offset-base-100 tw-ring-offset-2">
                        <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" />
                    </div>
                </div>
                <h1 class="tw-font-bold tw-text-3xl tw-mb-6">{{ $member->name }}</h1>
                <div class="tw-flex tw-justify-center tw-gap-x-4">
                    <a class="tw-cursor-pointer" href="https://www.facebook.com/profile.php?id=100079335878656" target="_blank" rel="noopener">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-6 tw-h-6" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    <a class="tw-cursor-pointer" href="https://twitter.com/ATOXIOS_PR" target="_blank" rel="noopener">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-6 tw-h-6" viewBox="0 0 24 24">
                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                        </svg>
                    </a>
                    <a class="tw-cursor-pointer" href="https://www.instagram.com/atoxios_pr" target="_blank" rel="noopener">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-6 tw-h-6" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="tw-py-12 tw-bg-base-100">
        <div class="tw-container tw-max-w-screen-md">
            <x-section-title title="CAREER" subtitle="経歴"></x-section-title>
            <p>{{ $member->career }}</p>
        </div>
    </section>
    <section class="tw-py-12 tw-bg-base-100">
        <div class="tw-container tw-max-w-screen-md">
            <x-section-title title="INTRODUCTION" subtitle="自己PR"></x-section-title>
            <p>{{ $member->introduction }}</p>
        </div>
    </section>
    <section class="tw-py-12 tw-bg-base-100">
        <x-section-title title="PLANS" subtitle="企画"></x-section-title>
        <div class="tw-container tw-max-w-screen-xl">
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @forelse ($member->plans as $plan)
                <x-plan-card :plan="$plan"></x-plan-card>
                @empty
                <p class="tw-text-center">
                    企画がありません。
                </p>
                @endforelse
            </div>
        </div>
    </section>
</x-app-layout>