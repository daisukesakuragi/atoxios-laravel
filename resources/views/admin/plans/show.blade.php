<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('企画詳細') }}
        </h1>
    </x-slot>
    <div class="tw-py-12 tw-container tw-max-w-screen-md">
        <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
            <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                <img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}" class="tw-w-full tw-h-52 lg:tw-h-96 tw-object-cover tw-rounded-t-lg">
                <div class="tw-p-6">
                    <h2 class="tw-text-lg tw-font-semibold">
                        {{ $plan->title }}
                    </h2>
                    <p class="tw-text-sm tw-text-gray-700 tw-mb-4">by <a href="{{ route('admin.members.show', $plan->member->id) }}" class="tw-underline">{{ $plan->member->name }}</a></p>
                    <div class="tw-mb-3">
                        <a href="{{ config('app.url') . '/plans/' . $plan->slug }}" class="tw-font-thin tw-text-indigo-700 tw-text-sm" target="_blank" rel="noopener">
                            {{ config('app.url') . '/plans/' . $plan->slug }}
                        </a>
                    </div>
                    <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
                        {{ $plan->description }}
                    </p>
                    <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
                        開催期間: {{ $plan->started_at }} ~ {{ $plan->finished_at }}
                    </p>
                    <hr class="tw-my-6">
                    <a href="{{ route('admin.plans.edit', $plan->id) }}" class="tw-bg-indigo-700 tw-text-white tw-block tw-text-center tw-rounded tw-p-2 tw-w-full tw-mb-3">{{ __('編集する') }}</a>
                    <form method="POST" action="{{ route('admin.plans.destroy', $plan->id) }}">
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