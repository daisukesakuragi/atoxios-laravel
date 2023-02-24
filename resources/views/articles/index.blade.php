<x-app-layout>
    <div class="tw-py-16 lg:tw-py-32 tw-container tw-max-w-screen-xl">
        <x-page-title title="記事一覧" subtitle="ARTICLES"></x-page-title>
        <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
            @foreach ($articles as $article)
            <livewire:article-card :article="$article">
                @endforeach
        </div>
        {{ $articles->links() }}
    </div>
</x-app-layout>