<x-app-layout>
    {{-- <x-slot name="header">
        <h1 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('記事詳細') }}
        </h1>
    </x-slot> --}}
    <div class="tw-py-12 tw-container tw-max-w-screen-md">
        <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
            <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}"
                    class="tw-w-full tw-h-52 lg:tw-h-96 tw-object-cover tw-rounded-t-lg">
                <div class="tw-p-6">
                    <h1 class="tw-text-xl tw-font-semibold">
                        {{ $article->title }}
                    </h1>
                    <div class="tw-mb-3 tw-flex tw-items-center tw-gap-3">
                        <time class="tw-text-sm">{{ date('Y/m/d', strtotime($article->created_at)) }}</time>
                        {{-- <time>{{ $article->updated_at }}</time> --}}
                    </div>
                    <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
                        {{ $article->description }}
                    </p>
                    <hr class="tw-my-6">
                    <p>
                        {{ $article->body }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
