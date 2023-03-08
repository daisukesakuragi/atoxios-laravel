<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('パスワード変更') }}
        </h1>
    </x-slot>
    <section class="tw-py-24">
        <div class="tw-container tw-max-w-screen-sm">
            <x-auth-card>
                <form action="{{ route('admin.update-password') }}" method="POST">
                    @csrf
                    <div>
                        <x-label for="old_password" :value="__('既存のパスワード')" />
                        <x-input id="old_password" class="tw-block tw-mt-1 tw-w-full" type="password" name="old_password" required autofocus />
                    </div>
                    <div class="tw-mt-4">
                        <x-label for="new_password" :value="__('新しいパスワード')" />
                        <x-input id="new_password" class="tw-block tw-mt-1 tw-w-full" type="password" name="new_password" required />
                    </div>
                    <div class="tw-mt-4">
                        <x-label for="new_password_confirmation" :value="__('新しいパスワード（確認用）')" />
                        <x-input id="new_password_confirmation" class="tw-block tw-mt-1 tw-w-full" type="password" name="new_password_confirmation" required />
                    </div>
                    <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                        <x-button>{{ __('パスワードを変更する') }}</x-button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </section>
</x-admin-layout>