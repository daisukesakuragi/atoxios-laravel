<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <figure>
                <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="tw-w-full tw-h-52 lg:tw-h-96 tw-object-cover tw-mb-8">
            </figure>
            <x-admin-page-title :title="$article->title"></x-admin-page-title>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">
                説明文
            </h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $article->description }}
            </p>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">
                本文
            </h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $article->body }}
            </p>
            <a href="{{ config('app.url') . '/articles/' . $article->slug }}" class="tw-btn tw-btn-accent tw-btn-block tw-mb-4" target="_blank" rel="noopener">
                {{ __('記事のページを確認する') }}
            </a>
            <a href="{{ route('admin.articles.edit', $article->id) }}" class="tw-btn tw-btn-info tw-btn-block tw-mb-4">{{ __('編集する') }}</a>
            <form method="POST" action="{{ route('admin.articles.destroy', $article->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="tw-btn tw-btn-error tw-btn-block">
                    削除する</button>
            </form>
        </div>
    </section>
</x-admin-layout>