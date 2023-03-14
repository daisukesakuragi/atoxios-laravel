<x-app-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-xl">
            <x-page-title title="記事一覧" subtitle="ARTICLES"></x-page-title>
            @if(count($articles) > 0)
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($articles as $article)
                <x-article-card :article="$article"></x-article-card>
                @endforeach
            </div>
            {{ $articles->links() }}
            @else
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('記事のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @endif
        </div>
    </section>
</x-app-layout>