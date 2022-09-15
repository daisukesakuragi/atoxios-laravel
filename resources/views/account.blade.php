<x-app-layout>
    <div class="tw-py-12 tw-container tw-max-w-screen-xl">
        <h1 class="tw-text-center tw-text-xl tw-mb-8">
            アカウント
        </h1>
        <a href="{{ route('account.showBidHistory') }}">
            入札履歴を見る
        </a>
        <a href="{{ route('account.showWithdrawalForm') }}">
            退会する
        </a>
    </div>
</x-app-layout>