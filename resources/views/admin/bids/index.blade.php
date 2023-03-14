<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-xl">
            <x-admin-page-title title="全ての入札履歴"></x-admin-page-title>
            @if(count($bids) === 0)
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('入札履歴のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @else
            <div class="tw-overflow-x-auto tw-w-full">
                <table class="tw-table tw-w-full">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('入札者名') }}</th>
                            <th>{{ __('入札金額') }}</th>
                            <th>{{ __('入札日時') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bids as $bid)
                        <tr>
                            <td>{{ $bid->id }}</td>
                            <td>{{ $bid->user->name }}</td>
                            <td>{{ number_format($bid->price) . '円' }}</td>
                            <td>{{ $bid->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $bids->links() }}
            @endif
        </div>
    </section>
</x-admin-layout>