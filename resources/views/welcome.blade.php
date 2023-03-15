<x-app-layout>
    @guest
    <section class="tw-hero" style="background-image: url('https://images.pexels.com/photos/3171837/pexels-photo-3171837.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
        <div class="tw-hero-overlay tw-bg-opacity-60 tw-pt-32 tw-pb-24"></div>
        <div class="tw-hero-content tw-text-center tw-text-neutral-content tw-pt-32 tw-pb-24">
            <div class="tw-max-w-2xl">
                <h1 class="tw-mb-6 tw-text-5xl lg:tw-text-7xl tw-font-bold tw-italic">
                    {{ __('"人に価値を"') }}
                </h1>
                <p class="tw-mb-8">
                    {{ __('ATOXIOSは人の存在意義に価値を付ける') }}<br>{{ __('次世代型オークションサービスです。') }}
                </p>
                <div class="tw-flex tw-items-center tw-flex-col lg:tw-flex-row tw-justify-center tw-gap-4">
                    <a href="{{ route('register') }}" class="tw-btn tw-btn-primary tw-btn-block lg:tw-btn-wide">
                        {{ __('新規登録') }}
                    </a>
                    <a href="{{ route('login') }}" class="tw-btn tw-btn-accent tw-btn-block lg:tw-btn-wide">
                        {{ __('ログイン') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endguest
    <section class="tw-pt-24 tw-pb-16 tw-bg-base-100 tw-text-base-content">
        <div class="tw-container tw-max-w-screen-xl">
            <x-section-title title="MEMBERS" subtitle="出品者"></x-section-title>
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
            <x-section-title title="PLANS" subtitle="企画"></x-section-title>
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
            <x-section-title title="ARTICLES" subtitle="記事"></x-section-title>
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($articles as $article)
                <x-article-card :article="$article"></x-article-card>
                @endforeach
            </div>
            {{ $articles->links() }}
        </div>
    </section>
</x-app-layout>