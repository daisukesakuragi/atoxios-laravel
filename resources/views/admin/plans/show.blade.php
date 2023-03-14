<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <figure>
                <img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}" class="tw-w-full tw-h-52 lg:tw-h-96 tw-object-cover tw-mb-8">
            </figure>
            <x-admin-page-title :title="$plan->title"></x-admin-page-title>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">
                出品者
            </h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                <a href="{{ route('admin.members.show', $plan->member->id) }}" class="tw-underline">{{ $plan->member->name }}</a>
            </p>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">
                説明文
            </h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $plan->description }}
            </p>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">
                オークション開始日時
            </h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $plan->started_at }}
            </p>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">
                オークション終了日時
            </h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $plan->finished_at }}
            </p>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">
                イベント開催日時
            </h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $plan->event_held_at }}
            </p>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">
                イベント開催場所
            </h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $plan->event_location }}
            </p>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">
                イベント集合場所
            </h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $plan->event_meeting_location }}
            </p>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">
                イベント集合時間
            </h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $plan->event_meeting_time }}
            </p>
            <a href="{{ config('app.url') . '/plans/' . $plan->slug }}" class="tw-btn tw-btn-accent tw-btn-block tw-mb-4" target="_blank" rel="noopener">
                {{ __('企画のページを確認する') }}
            </a>
            <a href="{{ route('admin.plans.edit', $plan->id) }}" class="tw-btn tw-btn-info tw-btn-block tw-mb-4">{{ __('編集する') }}</a>
            <form method="POST" action="{{ route('admin.plans.destroy', $plan->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="tw-btn tw-btn-error tw-btn-block">
                    削除する</button>
            </form>
        </div>
    </section>
</x-admin-layout>