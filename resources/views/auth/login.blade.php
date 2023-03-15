<x-guest-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-page-title title="ログイン" subtitle="LOGIN"></x-page-title>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('メールアドレス') }}</span>
                    </label>
                    <input type="email" placeholder="メールアドレスを入力してください" class="tw-input tw-input-bordered tw-w-full" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('パスワード') }}</span>
                    </label>
                    <input type="password" placeholder="パスワードを入力してください" class="tw-input tw-input-bordered tw-w-full" name="password" required autocomplete="current-password" />
                </div>
                <div class="tw-form-control tw-mb-8">
                    <label class="tw-label tw-cursor-pointer">
                        <span class="tw-label-text" name="remember">{{ __('ログイン情報を保持する') }}</span> 
                        <input type="checkbox" class="tw-checkbox" />
                    </label>
                </div>
                <div class="tw-text-center">
                    <button type="submit" class="tw-btn tw-btn-block tw-btn-primary tw-mb-6">{{ __('ログインする') }}</button>
                    @if (Route::has('password.request'))
                    <a class="tw-underline tw-text-sm" href="{{ route('password.request') }}">
                        {{ __('パスワードをお忘れですか？') }}
                    </a>
                    @endif
                </div>
                @if(count($errors) > 0)
                <ul class="tw-mt-2">
                    @foreach ($errors->all() as $error)
                    <li class="tw-text-error tw-text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </form>
        </div>
    </section>
</x-guest-layout>