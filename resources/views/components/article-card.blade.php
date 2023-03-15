<div class="tw-card tw-bg-base-100 tw-shadow-xl tw-image-full">
    <figure><img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="tw-h-80 tw-w-full tw-object-cover" /></figure>
    <div class="tw-card-body">
        <h2 class="tw-card-title">{{ $article->title }}</h2>
        <div class="tw-mb-3 tw-flex tw-items-center tw-gap-3">
            <time class="tw-text-sm">
                {{ date('Y/m/d', strtotime($article->created_at)) }}
            </time>
        </div>      
        <p class="tw-mb-6">
            {{ mb_strlen($article->description) > 50 ? mb_substr($article->description, 0, 50) . '...' : $article->description }}
        </p>
        <div class="tw-card-actions tw-justify-end">
            <a href="{{ route('articles.show', $article->slug) }}" class="tw-btn">詳細はこちら</a>
        </div>
    </div>
</div>