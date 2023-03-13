<div class="tw-card tw-bg-base-100 tw-shadow-xl tw-image-full">
    <figure><img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" /></figure>
    <div class="tw-card-body">
        <h2 class="tw-card-title">{{ $article->title }}</h2>
        <div class="tw-mb-3 tw-flex tw-items-center tw-gap-3">
            <time class="tw-text-sm">{{ date('Y/m/d', strtotime($article->created_at)) }}</time>
            {{-- <time>{{ $article->updated_at }}</time> --}}
        </div>      
        <div class="tw-card-actions tw-justify-end">
            <a href="{{ route('articles.show', $article->slug) }}" class="tw-btn tw-btn-primary">詳細はこちら</a>
        </div>
    </div>
</div>