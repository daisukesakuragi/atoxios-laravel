<x-guest-layout>
    <div class="tw-container tw-flex tw-flex-col tw-items-center tw-justify-center tw-w-full tw-h-full tw-py-32">
        <x-page-title title="新規登録" subtitle="Register"></x-page-title>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="tw-w-20 tw-h-20 tw-fill-current tw-text-gray-500" />
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="tw-mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('お名前')" />

                    <x-input id="name" class="tw-block tw-mt-1 tw-w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="tw-mt-4">
                    <x-label for="email" :value="__('メールアドレス')" />

                    <x-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="tw-mt-4">
                    <x-label for="password" :value="__('パスワード')" />

                    <x-input id="password" class="tw-block tw-mt-1 tw-w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="tw-mt-4">
                    <x-label for="password_confirmation" :value="__('パスワード（確認用）')" />

                    <x-input id="password_confirmation" class="tw-block tw-mt-1 tw-w-full" type="password" name="password_confirmation" required />
                </div>

                <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                    <a class="tw-underline tw-text-sm tw-text-gray-600 hover:tw-text-gray-900" href="{{ route('login') }}">
                        {{ __('アカウントをお持ちですか？') }}
                    </a>

                    <x-button class="tw-ml-4">
                        {{ __('登録する') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </div>
</x-guest-layout>