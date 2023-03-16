<x-app-layout>
    <section class="tw-py-16">
        <div class="tw-container tw-max-w-screen-sm">
            <div class="tw-prose">
                <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}"
                class="tw-w-full tw-h-60 lg:tw-h-96 tw-object-cover tw-rounded">
                <p>
                    <time>{{ date('Y/m/d', strtotime($article->created_at)) }}</time>
                </p>
                <h1>{{ $article->title }}</h1>
                <p class="tw-opacity-80">{{ $article->description }}</p>
                <hr>
                <div class="tw-whitespace-pre-wrap">{{ $article->body }}</div>
            </div>
            
        </div>
    </section>
</x-app-layout>
