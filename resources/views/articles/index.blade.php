<x-app-layout>
    <div class="tw-py-12 tw-container tw-max-w-screen-xl">
        <h1 class="tw-text-center tw-text-xl tw-mb-8">
            <x-application-logo class="tw-w-20 tw-h-20 tw-fill-current tw-text-indigo-500 tw-mx-auto" />
            <span>記事一覧</span>
        </h1>
        <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
            @foreach ($articles as $article)
                <livewire:article-card :article="$article">
            @endforeach
        </div>
        {{ $articles->links() }}
    </div>
</x-app-layout>
