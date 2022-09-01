<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('記事詳細') }}
        </h1>
    </x-slot>
    <div class="tw-py-12 tw-container tw-max-w-screen-md">
        <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
            <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}"
                    class="tw-w-full tw-h-52 lg:tw-h-96 tw-object-cover tw-rounded-t-lg">
                <div class="tw-p-6">
                    <h2 class="tw-text-lg tw-font-semibold">
                        {{ $article->title }}
                    </h2>
                    <div class="tw-mb-3">
                        <a href="{{ config('app.url') . '/articles/' . $article->slug }}"
                            class="tw-font-thin tw-text-indigo-700 tw-text-sm" target="_blank" rel="noopener">
                            {{ config('app.url') . '/articles/' . $article->slug }}
                        </a>
                    </div>
                    <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
                        {{ $article->description }}
                    </p>
                    <hr class="tw-my-6">
                    <p class="tw-whitespace-pre-wrap">{{ $article->body }}</p>
                    <hr class="tw-my-6">
                    <a href="{{ route('admin.articles.edit', $article->id) }}"
                        class="tw-bg-indigo-700 tw-text-white tw-block tw-text-center tw-rounded tw-p-2 tw-w-full tw-mb-3">編集する</a>
                    <form method="POST" action="{{ route('admin.articles.destroy', $article->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="tw-bg-red-600 tw-text-white tw-block tw-text-center tw-rounded tw-p-2 tw-w-full">
                            削除する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
