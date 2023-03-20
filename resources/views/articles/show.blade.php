<x-app-layout>
    <section class="tw-hero" style="background-image: url('{{ $article->thumbnail_url }}');">
        <div class="tw-hero-overlay tw-bg-opacity-60 tw-pt-32 tw-pb-24"></div>
        <div class="tw-hero-content tw-text-center tw-text-neutral-content tw-pt-32 tw-pb-24">
            <div class="tw-max-w-screen-sm tw-text-left">
                <p class="tw-mb-2">
                    <time>{{ date('Y/m/d', strtotime($article->created_at)) }}</time>
                </p>
                <h1 class="tw-mb-4 tw-text-4xl lg:tw-text-5xl tw-font-bold">{{ $article->title }}</h1>
                <p class="tw-mb-12">{{ $article->description }}</p>
                <a href="#body" class="tw-btn tw-btn-primary tw-btn-block">{{ __('詳しくはこちら') }}</a>
            </div>
        </div>
    </section>
    <section id="body" class="tw-py-16">
        <div class="tw-container tw-max-w-screen-sm">
            <div class="tw-prose">
                <div class="tw-whitespace-pre-wrap">{{ $article->body }}</div>
            </div>
        </div>
    </section>
</x-app-layout>
