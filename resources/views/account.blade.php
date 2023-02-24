<x-app-layout>
    <div class="tw-py-16 lg:tw-py-32 tw-container tw-max-w-screen-sm">
        <x-page-title title="アカウント" subtitle="ACCOUNT"></x-page-title>
        <x-auth-card>
            <h2 class="tw-font-bold tw-mb-2">ユーザー名</h2>
            <p class="tw-mb-4">{{ auth()->user()->name }}</p>
            <h2 class="tw-font-bold tw-mb-2">メールアドレス</h2>
            <p class="tw-mb-4">{{ auth()->user()->email }}</p>
            <h2 class="tw-font-bold tw-mb-2">メールアドレスの認証状況</h2>
            <p class="tw-mb-4">{{ auth()->user()->email_verified_at ? '認証済み' : '未認証' }}</p>
        </x-auth-card>
        <div class="tw-text-center tw-mt-8">
            <a href="{{ route('account.showWithdrawalForm') }}" class="tw-underline">
                退会はこちら
            </a>
        </div>
    </div>
</x-app-layout>