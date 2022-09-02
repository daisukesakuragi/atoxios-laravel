<x-app-layout>
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
                    <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
                        {{ $member->career }}
                    </p>
                    <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
                        {{ $member->introduction }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>