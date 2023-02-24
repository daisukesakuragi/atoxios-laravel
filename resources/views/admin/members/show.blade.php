<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('出品者詳細') }}
        </h1>
    </x-slot>
    <div class="tw-py-12 tw-container tw-max-w-screen-md">
        <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
            <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" class="tw-w-full tw-h-52 lg:tw-h-96 tw-object-cover tw-rounded-t-lg">
                <div class="tw-p-6">
                    <h2 class="tw-text-lg tw-font-semibold">
                        {{ $member->name }}
                    </h2>
                    <div class="tw-mb-3">
                        <a href="{{ config('app.url') . '/members/' . $member->slug }}" class="tw-font-thin tw-text-indigo-700 tw-text-sm" target="_blank" rel="noopener">
                            {{ config('app.url') . '/members/' . $member->slug }}
                        </a>
                    </div>
                    <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
                        {{ $member->career }}
                    </p>
                    <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
                        {{ $member->introduction }}
                    </p>
                    <hr class="tw-my-6">
                    <a href="{{ route('admin.members.edit', $member->id) }}" class="tw-bg-indigo-700 tw-text-white tw-block tw-text-center tw-rounded tw-p-2 tw-w-full tw-mb-3">{{ __('編集する') }}</a>
                    <form method="POST" action="{{ route('admin.members.destroy', $member->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tw-bg-red-600 tw-text-white tw-block tw-text-center tw-rounded tw-p-2 tw-w-full">
                            削除する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>