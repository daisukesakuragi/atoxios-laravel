<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('出品者一覧') }}
        </h1>
    </x-slot>
    <div class="tw-py-12 tw-container tw-max-w-screen-xl">
        <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
            @foreach ($members as $member)
            <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" class="tw-w-full tw-h-52 lg:tw-h-64 tw-object-cover tw-rounded-t-lg">
                <div class="tw-p-6">
                    <h3 class="tw-text-lg tw-font-semibold">
                        {{ $member->name }}
                    </h3>
                    <a href="{{ route('admin.members.show', $member->id) }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full">詳細をみる</a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $members->links() }}
    </div>
</x-admin-layout>