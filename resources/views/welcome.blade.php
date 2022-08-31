<x-app-layout>
    @if (!Auth::guard('web')->check())
        <section class=" tw-bg-indigo-700 tw-w-screen tw-h-screen">
            <div
                class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-h-full tw-w-full tw-container tw-max-w-screen-xl">
                <p class="tw-text-indigo-50 md:tw-text-lg xl:tw-text-xl tw-font-semibold tw-mb-4 md:tw-mb-6">Very proud
                    to
                    introduce</p>

                <h1 class="tw-text-indigo-50 tw-text-7xl tw-font-bold tw-mb-8 md:tw-mb-12">
                    QoL</h1>

                <div class="tw-w-full tw-flex tw-flex-col sm:tw-flex-row sm:tw-justify-center tw-gap-2.5">
                    <a href="{{ route('register') }}"
                        class="tw-inline-block tw-bg-indigo-700 tw-font-semibold tw-text-center tw-rounded-lg tw-border tw-border-white tw-text-white tw-px-8 tw-py-3">会員登録</a>

                    <a href="{{ route('login') }}"
                        class="tw-inline-block tw-bg-white tw-font-semibold tw-text-center tw-rounded-lg tw-text-indigo-700 tw-px-8 tw-py-3">ログイン</a>
                </div>
            </div>
        </section>
    @endif
    <section id="articles" class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-center tw-text-xl tw-mb-8">
                <x-application-logo class="tw-w-20 tw-h-20 tw-fill-current tw-text-indigo-700 tw-mx-auto" />
                <span class="tw-text-indigo-700">ARTICLES</span>
            </h2>
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($articles as $article)
                    <livewire:article-card :article="$article">
                @endforeach
            </div>
            <a href="{{ route('articles.index') }}"
                class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-max-w-sm tw-mx-auto tw-shadow-lg">全ての記事を読む</a>
        </div>
    </section>
    <section id="movie" class="tw-py-24 tw-bg-indigo-700">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-center tw-text-xl tw-mb-8">
                <x-application-logo class="tw-w-20 tw-h-20 tw-fill-current tw-text-white tw-mx-auto" />
                <span class="tw-text-white">MOVIE</span>
            </h2>
        </div>
    </section>
    <section id="ending-note" class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-center tw-text-xl tw-mb-8">
                <x-application-logo class="tw-w-20 tw-h-20 tw-fill-current tw-text-indigo-700 tw-mx-auto" />
                <span class="tw-text-indigo-700">ENDING NOTE</span>
            </h2>
        </div>
    </section>
    <section id="izou" class="tw-py-24 tw-bg-indigo-700">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-center tw-text-xl tw-mb-8">
                <x-application-logo class="tw-w-20 tw-h-20 tw-fill-current tw-text-white tw-mx-auto" />
                <span class="tw-text-white">IZOU</span>
            </h2>
        </div>
    </section>
    <section id="iei" class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-center tw-text-xl tw-mb-8">
                <x-application-logo class="tw-w-20 tw-h-20 tw-fill-current tw-text-indigo-700 tw-mx-auto" />
                <span class="tw-text-indigo-700">IEI</span>
            </h2>
        </div>
    </section>
</x-app-layout>
