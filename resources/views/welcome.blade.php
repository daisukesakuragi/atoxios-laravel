<x-app-layout>
    @guest
    <section class="tw-w-screen tw-h-screen">
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-h-full tw-w-full tw-container tw-max-w-screen-xl">
            <h1 class="tw-text-gray-800 tw-text-7xl tw-font-bold tw-mb-8 md:tw-mb-12">
                ATOXIOS</h1>
            <div class="tw-w-full tw-flex tw-flex-col sm:tw-flex-row sm:tw-justify-center tw-gap-2.5">
                <a href="{{ route('register') }}" class="tw-inline-block tw-bg-gray-800 tw-font-semibold tw-text-center tw-rounded-lg tw-border tw-border-white tw-text-white tw-px-8 tw-py-3">新規登録</a>
                <a href="{{ route('login') }}" class="tw-inline-block tw-bg-white tw-font-semibold tw-text-center tw-rounded-lg tw-border tw-border-gray-800 tw-text-gray-800 tw-px-8 tw-py-3">ログイン</a>
            </div>
        </div>
    </section>
    @endguest
    <section class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">MEMBERS</h2>
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($members as $member)
                <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                    <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" class="tw-w-full tw-h-52 lg:tw-h-64 tw-object-cover tw-rounded-t-lg">
                    <div class="tw-p-6">
                        <h3 class="tw-text-lg tw-font-semibold">
                            {{ $member->name }}
                        </h3>
                        <p class="tw-mb-4">
                            {{ $member->introduction }}
                        </p>
                        <a href="{{ route('members.show', $member->slug) }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full">詳細をみる</a>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $members->links() }}
        </div>
    </section>
    <section class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">PLANS</h2>
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($plans as $plan)
                <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                    <img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}" class="tw-w-full tw-h-52 lg:tw-h-64 tw-object-cover tw-rounded-t-lg">
                    <div class="tw-p-6">
                        <h3 class="tw-text-lg tw-font-semibold">
                            {{ $plan->title }}
                        </h3>
                        <p class="tw-text-sm tw-text-gray-700 tw-mb-4">by <a href="{{ route('members.show', $plan->member->slug) }}" class="tw-underline">{{ $plan->member->name }}</a></p>
                        <a href="{{ route('plans.show', $plan->slug) }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full">詳細をみる</a>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $plans->links() }}
        </div>
    </section>
    <section class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">ARTICLES</h2>
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($articles as $article)
                <livewire:article-card :article="$article">
                    @endforeach
            </div>
            {{ $articles->links() }}
        </div>
    </section>
</x-app-layout>