<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('記事一覧') }}
        </h1>
    </x-slot>
    <div class="tw-py-24 tw-container tw-max-w-screen-xl">
        @if(count($articles) === 0)
        <p class="tw-text-center">
            {{ __('記事のデータがありません。') }}
        </p>
        @else
        <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
            @foreach ($articles as $article)
            <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="tw-w-full tw-h-52 lg:tw-h-64 tw-object-cover tw-rounded-t-lg">
                <div class="tw-p-6">
                    <h3 class="tw-text-lg tw-font-semibold">
                        {{ $article->title }}
                    </h3>
                    <p class="tw-mb-4">{{ mb_substr($article->description, 0, 65) . '...' }}</p>
                    <a href="{{ route('admin.articles.show', $article->id) }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full">詳細をみる</a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $articles->links() }}
        @endif
    </div>
</x-admin-layout>