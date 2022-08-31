<div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
    <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}"
        class="tw-w-full tw-h-52 lg:tw-h-64 tw-object-cover tw-rounded-t-lg">
    <div class="tw-p-6">
        <h3 class="tw-text-lg tw-font-semibold">
            {{ $article->title }}
        </h3>
        <div class="tw-mb-3 tw-flex tw-items-center tw-gap-3">
            <time class="tw-text-sm">{{ date('Y/m/d', strtotime($article->created_at)) }}</time>
            {{-- <time>{{ $article->updated_at }}</time> --}}
        </div>
        <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
            {{ substr($article->description, 0, 120) . '...' }}
        </p>
        <a href="{{ route('articles.show', $article->slug) }}"
            class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full">記事を読む</a>
    </div>
</div>
