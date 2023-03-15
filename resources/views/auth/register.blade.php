<x-guest-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-page-title title="新規登録" subtitle="REGISTER"></x-page-title>
            <form method="POST" action="{{ route('register') }}" class="tw-w-full">
                @csrf
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('お名前') }}</span>
                    </label>
                    <input type="text" placeholder="お名前を入力してください" class="tw-input tw-input-bordered tw-w-full" name="name" :value="old('name')" required autofocus />
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('メールアドレス') }}</span>
                    </label>
                    <input type="email" placeholder="メールアドレスを入力してください" class="tw-input tw-input-bordered tw-w-full" name="email" :value="old('email')" required />
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('パスワード') }}</span>
                    </label>
                    <input type="password" placeholder="パスワードを入力してください" class="tw-input tw-input-bordered tw-w-full" name="password" required autocomplete="new-password" />
                </div>
                <div class="tw-form-control tw-mb-8">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('パスワード（確認用）') }}</span>
                    </label>
                    <input type="password" placeholder="パスワード（確認用）を入力してください" class="tw-input tw-input-bordered tw-w-full" name="password_confirmation" required />
                </div>
                <div class="tw-text-center">
                    <button type="submit" class="tw-btn tw-btn-block tw-btn-primary tw-mb-6">{{ __('登録する') }}</button>
                    <a class="tw-underline tw-text-sm" href="{{ route('login') }}">
                        {{ __('アカウントをお持ちですか？') }}
                    </a>
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