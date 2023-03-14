<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-admin-page-title title="メールアドレス変更"></x-admin-page-title>
            <form action="{{ route('admin.update-email') }}" method="POST">
                @csrf
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('新しいメールアドレス') }}</span>
                    </label>
                    <input class="tw-input tw-input-bordered tw-w-full" value="{{ old('new_email') }}" type="email" name="new_email" placeholder="新しいメールアドレスを入力してください" required />
                </div>
                <div class="tw-form-control tw-mb-8">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('新しいメールアドレス（確認用）') }}</span>
                    </label>
                    <input class="tw-input tw-input-bordered tw-w-full" value="{{ old('new_email_confirmation') }}" type="email" name="new_email_confirmation" placeholder="新しいメールアドレス（確認用）を入力してください" required />
                </div>
                <div class="tw-text-center">
                    <button type="submit" class="tw-btn tw-btn-block tw-btn-primary tw-mb-4">{{ __('メールアドレスを変更する') }}</button>
                </div>
            </form>
        </div>
    </section>
</x-admin-layout>
