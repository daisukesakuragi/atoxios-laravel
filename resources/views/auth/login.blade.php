<x-guest-layout>
    <div class="tw-container tw-max-w-screen-sm tw-flex tw-flex-col tw-items-center tw-justify-center tw-w-full tw-h-full tw-py-16 lg:tw-py-32">
        <x-page-title title="ログイン" subtitle="LOGIN"></x-page-title>
        <x-auth-card>
            <x-auth-session-status class="tw-mb-4" :status="session('status')" />
            <x-auth-validation-errors class="tw-mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <x-label for="email" :value="__('メールアドレス')" />

                    <x-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="tw-mt-4">
                    <x-label for="password" :value="__('パスワード')" />

                    <x-input id="password" class="tw-block tw-mt-1 tw-w-full" type="password" name="password" required autocomplete="current-password" />
                </div>
                <div class="tw-block tw-mt-4">
                    <label for="remember_me" class="tw-inline-flex tw-items-center">
                        <input id="remember_me" type="checkbox" class="tw-rounded tw-border-gray-300 tw-text-indigo-600 tw-shadow-sm focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50" name="remember">
                        <span class="tw-ml-2 tw-text-sm tw-text-gray-600">{{ __('ログイン情報を保持する') }}</span>
                    </label>
                </div>

                <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                    @if (Route::has('password.request'))
                    <a class="tw-underline tw-text-sm tw-text-gray-600 hover:tw-text-gray-900" href="{{ route('password.request') }}">
                        {{ __('パスワードをお忘れですか？') }}
                    </a>
                    @endif

                    <x-button class="tw-ml-3">
                        {{ __('ログインする') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </div>
</x-guest-layout>