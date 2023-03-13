<x-guest-layout>
    <div class="tw-container tw-flex tw-flex-col tw-items-center tw-justify-center tw-w-full tw-h-full tw-py-16 lg:tw-py-32">
        <x-page-title title="新規登録" subtitle="REGISTER"></x-page-title>
        <form>
            <div class="tw-form-control">
                <label class="tw-label">
                    <span class="label-text">Your Email</span>
                </label>
                <label class="input-group input-group-vertical">
                    <span>Email</span>
                    <input type="text" placeholder="info@site.com" class="input input-bordered" />
                </label>
              </div>
        </form>
        <x-auth-card>
            <x-auth-validation-errors class="tw-mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-label for="name" :value="__('お名前')" />

                    <x-input id="name" class="tw-block tw-mt-1 tw-w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
                <div class="tw-mt-4">
                    <x-label for="email" :value="__('メールアドレス')" />

                    <x-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="tw-mt-4">
                    <x-label for="password" :value="__('パスワード')" />

                    <x-input id="password" class="tw-block tw-mt-1 tw-w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
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