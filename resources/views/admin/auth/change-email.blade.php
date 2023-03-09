<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('メールアドレス変更') }}
        </h1>
    </x-slot>
    <section class="tw-py-24">
        <div class="tw-container tw-max-w-screen-sm">
            <x-auth-card>
                <form action="{{ route('admin.update-email') }}" method="POST">
                    @csrf
                    <div class="tw-mt-4">
                        <x-label for="new_email" :value="__('新しいメールアドレス')" />
                        <x-input id="new_email" value="{{ old('new_email') }}" class="tw-block tw-mt-1 tw-w-full" type="email" name="new_email" required />
                    </div>
                    <div class="tw-mt-4">
                        <x-label for="new_email_confirmation" :value="__('新しいメールアドレス（確認用）')" />
                        <x-input id="new_email_confirmation" value="{{ old('new_email_confirmation') }}" class="tw-block tw-mt-1 tw-w-full" type="email" name="new_email_confirmation" required />
                    </div>
                    <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                        <x-button>{{ __('メールアドレスを変更する') }}</x-button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </section>
</x-admin-layout>
