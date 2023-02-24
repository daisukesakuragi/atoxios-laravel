<x-app-layout>
    <section>
        <div class="tw-py-16 lg:tw-py-32 tw-container tw-max-w-screen-sm">
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
                <div class="tw-p-4 tw-text-blue-900 tw-bg-blue-100 tw-border tw-border-blue-200 tw-rounded">
                    <div class="tw-flex tw-justify-between tw-flex-wrap">
                        <div class="tw-w-0 tw-flex-1 tw-flex">
                            <div class="tw-w-full">
                                <p class="tw-font-bold tw-text-md">
                                    {{ __('入札履歴のデータが見つかりませんでした。') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                @endforelse
            </div>
            {{ $bids->links() }}
        </div>
    </section>
</x-app-layout>