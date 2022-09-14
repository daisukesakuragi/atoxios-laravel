<x-app-layout>
    <div class="tw-py-12 tw-container tw-max-w-screen-md">
        <h1 class="tw-text-2xl tw-font-bold tw-mb-12 tw-text-center">
            あなたの入札履歴
        </h1>
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
            <p class="tw-text-center">
                入札履歴がありません。
            </p>
            @endforelse
        </div>
        {{ $bids->links() }}
    </div>
</x-app-layout>