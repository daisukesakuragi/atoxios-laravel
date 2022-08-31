<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('記事一覧') }}
        </h1>
    </x-slot>
    <div class="tw-py-12 tw-container tw-max-w-screen-xl">
        <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
            @foreach ($articles as $article)
                <livewire:admin.article-card :article="$article">
            @endforeach
        </div>
        {{ $articles->links() }}
    </div>
</x-admin-layout>
