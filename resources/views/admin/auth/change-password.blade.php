<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-admin-page-title title="パスワード変更"></x-admin-page-title>
            <form action="{{ route('admin.update-password') }}" method="POST">
                @csrf
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('既存のパスワード') }}</span>
                    </label>
                    <input class="tw-input tw-input-bordered tw-w-full" type="password" name="old_password" required autofocus />
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('新しいパスワード') }}</span>
                    </label>
                    <input class="tw-input tw-input-bordered tw-w-full" type="password" name="new_password" required />
                </div>
                <div class="tw-form-control tw-mb-8">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('新しいパスワード（確認用）') }}</span>
                    </label>
                    <input class="tw-input tw-input-bordered tw-w-full" type="password" name="new_password_confirmation" required />
                </div>
                <div class="tw-text-center">
                    <button type="submit" class="tw-btn tw-btn-block tw-btn-primary tw-mb-4">{{ __('パスワードを変更する') }}</button>
                </div>
            </form>
        </div>
    </section>
</x-admin-layout>