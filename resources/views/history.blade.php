<x-app-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-xl">
            <x-page-title title="あなたの入札履歴" subtitle="YOUR BID HISTORY"></x-page-title>
            @if(count($bids) > 0)
            <div class="tw-overflow-x-auto tw-w-full">
                <table class="tw-table tw-w-full tw-mb-12">
                    <thead>
                        <tr>
                            <th>入札企画</th>
                            <th>入札金額</th>
                            <th>入札日時</th>
                            <th>入札企画の詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bids as $bid)
                        <tr>
                            <td>
                                {{ mb_strlen($bid->plan->title) > 15 ? mb_substr($bid->plan->title, 0, 15) . '...' : $bid->plan->title }}
                            </td>
                            <td>
                                {{ number_format($bid->price) . '円' }}
                            </td>
                            <td>
                                {{ date('Y/m/d H:i:s', strtotime($bid->created_at)) }}
                            </td>
                            <th>
                                <button class="tw-btn tw-btn-primary tw-btn-sm">詳細はこちら</button>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>                  
                </table>
            </div>
            {{ $bids->links() }}
            @else
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('入札履歴のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @endif
        </div>
    </section>
</x-app-layout>