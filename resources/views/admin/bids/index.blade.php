<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('入札履歴') }}
        </h1>
    </x-slot>
    <div class="tw-py-24 tw-container tw-max-w-screen-xl">
        <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">{{ __('入札履歴') }}</h2>
        @if(count($bids) === 0)
        <p class="tw-text-center">
            {{ __('入札履歴のデータがありません。') }}
        </p>
        @else
        <table class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-w-full tw-mb-16 tw-table-auto">
            <thead class="tw-border tw-border-b-2">
                <tr>
                    <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('ID') }}</th>
                    <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('入札者名') }}</th>
                    <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('入札金額') }}</th>
                    <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('入札日時') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bids as $bid)
                <tr>
                    <td class="tw-px-4 tw-py-2 tw-text-left">{{ $bid->id }}</td>
                    <td class="tw-px-4 tw-py-2 tw-text-left">{{ $bid->user->name }}</td>
                    <td class="tw-px-4 tw-py-2 tw-text-left">{{ number_format($bid->price) . '円' }}</td>
                    <td class="tw-px-4 tw-py-2 tw-text-left">{{ $bid->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $bids->links() }}
        @endif
    </div>
</x-admin-layout>