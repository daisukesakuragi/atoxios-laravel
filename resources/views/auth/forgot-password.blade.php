<x-guest-layout>
    <div class="tw-container tw-max-w-screen-sm tw-flex tw-flex-col tw-items-center tw-justify-center tw-w-full tw-h-full tw-py-16 lg:tw-py-32">
        <x-page-title title="パスワードの再設定" subtitle="RESET PASSWORD"></x-page-title>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="tw-w-20 tw-h-20 tw-fill-current tw-text-gray-500" />
                </a>
            </x-slot>
            <div class="tw-mb-4 tw-text-sm tw-text-gray-600">
                <p class="tw-mb-2">{{ __('パスワードをお忘れですか？') }}</p>
                <p>{{ __('下記のフォームより、ご登録いただいたメールアドレスを入力して送信していただけましたら、同メールアドレス宛にパスワードの再設定用リンクを送信させていただきます。') }}</p>
            </div>
            <x-auth-session-status class="tw-mb-4" :status="session('status')" />
            <x-auth-validation-errors class="tw-mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <x-label for="email" :value="__('メールアドレス')" />
                    <x-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" placeholder="test@atoxios.com" required autofocus />
                </div>

                <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                    <x-button>
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </div>
</x-guest-layout>