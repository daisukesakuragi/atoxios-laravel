<x-app-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-page-title title="入札履歴" subtitle="BID HISTORY"></x-page-title>
            <div class="tw-flex tw-flex-col tw-gap-y-6 tw-mb-12">
                @forelse ($bids as $bid)
                <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                    <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                        <div class="tw-p-6">
                            <h3 class="tw-text-lg tw-font-semibold">
                                {{ $bid->price . '円' }}
                            </h3>
                            <p class="tw-text-sm tw-text-gray-700">{{ $bid->created_at }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <span class="tw-font-bold tw-text-sm">{{ __('入札履歴のデータが見つかりませんでした。') }}</span>
                    </div>
                </div>
                @endforelse
            </div>
            {{ $bids->links() }}
        </div>
    </section>
</x-app-layout>