<x-guest-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-page-title title="パスワードの再設定" subtitle="RESET PASSWORD"></x-page-title>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="tw-form-control tw-w-full tw-mb-4">
                    <label class="tw-label">
                      <span class="tw-label-text">{{ __('メールアドレス') }}</span>
                    </label>
                    <input class="tw-input tw-input-bordered tw-w-full" placeholder="メールアドレスを入力してください" id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" value="{{ old('email', $request->email) }}" required />
                </div>
                <div class="tw-form-control tw-w-full tw-mb-4">
                    <label class="tw-label">
                      <span class="tw-label-text">{{ __('新しいパスワード') }}</span>
                    </label>
                    <input type="password" placeholder="新しいパスワードを入力してください" class="tw-input tw-input-bordered tw-w-full" name="password" required />
                </div>
                <div class="tw-form-control tw-w-full tw-mb-8">
                    <label class="tw-label">
                      <span class="tw-label-text">{{ __('新しいパスワード（確認用）') }}</span>
                    </label>
                    <input type="password" placeholder="新しいパスワード（確認用）を入力してください" class="tw-input tw-input-bordered tw-w-full" name="password_confirmation" required />
                </div>
                <div class="tw-text-center">
                    <button type="submit" class="tw-btn tw-btn-block tw-btn-primary">{{ __('パスワードを再設定する') }}</button>
                </div>
                @if(count($errors) > 0)
                <ul class="tw-mt-4">
                    @foreach ($errors->all() as $error)
                    <li class="tw-text-error tw-text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </form>
        </div>
    </section>
</x-guest-layout>
