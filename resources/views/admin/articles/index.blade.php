<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-xl">
            <x-admin-page-title title="全ての記事"></x-admin-page-title>
            @if(count($articles) === 0)
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('記事のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @else
            <div class="tw-overflow-x-auto tw-w-full">
                <table class="tw-table tw-w-full">
                    <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>説明文</th>
                            <th>詳細ページ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                        <td>
                            <div class="tw-flex tw-items-center tw-space-x-3">
                            <div class="tw-avatar">
                                <div class="tw-mask tw-mask-squircle tw-w-12 tw-h-12">
                                    <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" />
                                </div>
                            </div>
                            <div>
                                <div class="tw-font-bold">
                                    {{ mb_strlen($article->title) > 15 ? mb_substr($article->title, 0, 15) . '...' : $article->title }}
                                </div>
                            </div>
                            </div>
                        </td>
                        <td>
                            <div class="tw-text-sm">
                                {{ mb_strlen($article->description) > 30 ? mb_substr($article->description, 0, 30) . '...' : $article->description }}
                            </div>
                        </td>
                        <th>
                            <a href="{{ route('admin.articles.show', $article->id) }}" class="tw-btn tw-btn-primary tw-btn-sm">
                                {{ __('詳細ページ') }}
                            </a>
                        </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $articles->links() }}
            @endif
        </div>
    </section>
</x-admin-layout>