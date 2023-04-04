<x-app-layout>
    <section class="tw-hero">
        <div class="tw-hero-content tw-text-center tw-pt-32 tw-pb-24">
            <div class="tw-text-center">
                <h1 class="tw-text-6xl lg:tw-text-9xl tw-font-bold tw-text-base-content">{{ __('ATOXIOS') }}</h1>
                @guest
                <div class="tw-flex tw-items-center tw-flex-col lg:tw-flex-row tw-justify-center tw-gap-4 tw-mt-16">
                    <a href="{{ route('register') }}" class="tw-btn tw-btn-primary tw-btn-block lg:tw-btn-wide">{{ __('新規登録') }}</a>
                    <a href="{{ route('login') }}" class="tw-btn tw-btn-accent tw-btn-block lg:tw-btn-wide">{{ __('ログイン') }}</a>
                </div>
                @endguest
            </div>
        </div>
    </section>
    <section class="tw-pt-24 tw-pb-16 tw-bg-base-100 tw-text-base-content">
        <div class="tw-container tw-max-w-screen-xl">
            <x-section-title title="出品者" subtitle="MEMBERS"></x-section-title>
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-4 tw-gap-8 lg:tw-gap-16 tw-mb-12">
                @foreach ($members as $member)
                <x-member-card :member="$member"></x-member-card>
                @endforeach
            </div>
            {{ $members->links() }}
        </div>
    </section>
    <section class="tw-py-8 tw-bg-base-100 tw-text-base-content">
        <div class="tw-container tw-max-w-screen-xl">
            <x-section-title title="企画" subtitle="PLANS"></x-section-title>
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($plans as $plan)
                <x-plan-card :plan="$plan"></x-plan-card>
                @endforeach
            </div>
            {{ $plans->links() }}
        </div>
    </section>
    <section class="tw-py-8 tw-bg-base-100 tw-text-base-content">
        <div class="tw-container tw-max-w-screen-xl">
            <x-section-title title="記事" subtitle="ARTICLES"></x-section-title>
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($articles as $article)
                <x-article-card :article="$article"></x-article-card>
                @endforeach
            </div>
            {{ $articles->links() }}
        </div>
    </section>
</x-app-layout>