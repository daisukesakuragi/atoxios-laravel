<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('企画一覧') }}
        </h1>
    </x-slot>
    <div class="tw-py-24 tw-container tw-max-w-screen-xl">
        <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">{{ __('企画一覧') }}</h2>
        @if(count($plans) === 0)
        <p class="tw-text-center">
            {{ __('企画のデータがありません。') }}
        </p>
        @else
        <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
            @foreach ($plans as $plan)
            <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                <img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}" class="tw-w-full tw-h-52 lg:tw-h-64 tw-object-cover tw-rounded-t-lg">
                <div class="tw-p-6">
                    <h3 class="tw-text-lg tw-font-semibold">
                        {{ $plan->title }}
                    </h3>
                    <p class="tw-text-sm tw-text-gray-700 tw-mb-4">by <a href="{{ route('admin.members.show', $plan->member->id) }}" class="tw-underline">{{ $plan->member->name }}</a></p>
                    <a href="{{ route('admin.plans.show', $plan->id) }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full">詳細をみる</a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $plans->links() }}
        @endif
    </div>
</x-admin-layout>