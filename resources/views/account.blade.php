<x-app-layout>
    <div class="tw-py-16 lg:tw-py-32 tw-container tw-max-w-screen-sm">
        <x-page-title title="アカウント" subtitle="ACCOUNT"></x-page-title>
        <div class="tw-overflow-x-auto tw-mb-16">
            <table class="tw-table tw-w-full">
                <tbody>
                    <tr>
                        <th>{{ __('ユーザー名')}}</th>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('メールアドレス')}}</th>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('メールアドレスの認証')}}</th>
                        <td>{{ auth()->user()->email_verified_at ? '認証済み' : '未認証' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tw-text-center">
            <a href="{{ route('account.showWithdrawalForm') }}" class="tw-underline">
                退会はこちら
            </a>
        </div>
    </div>
</x-app-layout>