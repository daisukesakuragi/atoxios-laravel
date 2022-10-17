<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('入札者一覧') }}
        </h1>
    </x-slot>
    <div class="tw-py-24 tw-container tw-max-w-screen-xl">
        <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">{{ __('入札者一覧') }}</h2>
        @if(count($users) === 0)
        <p class="tw-text-center">
            {{ __('入札者のデータがありません。') }}
        </p>
        @else
        <table class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-w-full tw-mb-16 tw-table-auto">
            <thead class="tw-border tw-border-b-2">
                <tr>
                    <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('ID') }}</th>
                    <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('名前') }}</th>
                    <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('メールアドレス') }}</th>
                    <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('メールアドレス確認状況') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="tw-px-4 tw-py-2 tw-text-left">{{ $user->id }}</td>
                    <td class="tw-px-4 tw-py-2 tw-text-left">{{ $user->name }}</td>
                    <td class="tw-px-4 tw-py-2 tw-text-left">{{ $user->email }}</td>
                    <td class="tw-px-4 tw-py-2 tw-text-left">{{ $user->hasVerifiedEmail() ? '確認済み' : '未確認' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
        @endif
    </div>
</x-admin-layout>