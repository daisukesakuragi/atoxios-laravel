<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm tw-text-center">
            <div class="tw-avatar tw-max-w-xs tw-mb-8">
                <div class="tw-w-full tw-rounded-full tw-ring tw-ring-primary tw-ring-offset-base-100 tw-ring-offset-2">
                    <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" />
                </div>
            </div>
            <x-admin-page-title :title="$member->name"></x-admin-page-title>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">経歴</h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $member->career }}
            </p>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">自己PR</h2>
            <p class="tw-text-sm tw-text-left tw-mb-8">
                {{ $member->introduction }}
            </p>
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">Facebook</h2>
            @if($member->facebook_url)
            <a href="{{ $member->facebook_url }}" class="tw-text-sm tw-block tw-underline tw-text-left tw-mb-8" target="_blank" rel="noopener">{{ $member->facebook_url }}</a>
            @else
            <p class="tw-text-sm tw-text-left tw-mb-8">{{ __('なし') }}</p>
            @endif
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">Instagram</h2>
            @if($member->instagram_url)
            <a href="{{ $member->instagram_url }}" class="tw-text-sm tw-block tw-underline tw-text-left tw-mb-8" target="_blank" rel="noopener">{{ $member->instagram_url }}</a>
            @else
            <p class="tw-text-sm tw-text-left tw-mb-8">{{ __('なし') }}</p>
            @endif
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">Twitter</h2>
            @if($member->twitter_url)
            <a href="{{ $member->twitter_url }}" class="tw-text-sm tw-block tw-underline tw-text-left tw-mb-8" target="_blank" rel="noopener">{{ $member->twitter_url }}</a>
            @else
            <p class="tw-text-sm tw-text-left tw-mb-8">{{ __('なし') }}</p>
            @endif
            <h2 class="tw-text-left tw-font-bold tw-text-xl tw-mb-4">Tiktok</h2>
            @if($member->tiktok_url)
            <a href="{{ $member->tiktok_url }}" class="tw-text-sm tw-block tw-underline tw-text-left tw-mb-8" target="_blank" rel="noopener">{{ $member->tiktok_url }}</a>
            @else
            <p class="tw-text-sm tw-text-left tw-mb-8">{{ __('なし') }}</p>
            @endif
            @if($member->youtube_url)
            <a href="{{ $member->youtube_url }}" class="tw-text-sm tw-block tw-underline tw-text-left tw-mb-8" target="_blank" rel="noopener">{{ $member->youtube_url }}</a>
            @else
            <p class="tw-text-sm tw-text-left tw-mb-8">{{ __('なし') }}</p>
            @endif
            <a href="{{ config('app.url') . '/members/' . $member->slug }}" class="tw-btn tw-btn-accent tw-btn-block tw-mb-4" target="_blank" rel="noopener">
                {{ __('出品者のページを確認する') }}
            </a>
            <a href="{{ route('admin.members.edit', $member->id) }}" class="tw-btn tw-btn-info tw-btn-block tw-mb-4">{{ __('編集する') }}</a>
            <form method="POST" action="{{ route('admin.members.destroy', $member->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="tw-btn tw-btn-error tw-btn-block">
                    {{ __('削除する') }}</button>
            </form>
        </div>
    </section>
</x-admin-layout>