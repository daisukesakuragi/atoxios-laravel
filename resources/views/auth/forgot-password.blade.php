<x-guest-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-page-title title="パスワードをお忘れですか？" subtitle="FORGOT PASSWORD?"></x-page-title>
            <p class="tw-mb-4">{{ __('パスワードをお忘れの場合は、下記のフォームよりご登録いただいたメールアドレスを入力して送信してください。') }}</p>
            <p class="tw-mb-8">{{ __('同メールアドレス宛にパスワードの再設定用リンクを送信させていただきます。') }}</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="tw-form-control tw-mb-8">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('メールアドレス') }}</span>
                    </label>
                    <input type="email" placeholder="メールアドレスを入力してください" class="tw-input tw-input-bordered tw-w-full" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="tw-text-center">
                    <button type="submit" class="tw-btn tw-btn-block tw-btn-primary">{{ __('送信する') }}</button>
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