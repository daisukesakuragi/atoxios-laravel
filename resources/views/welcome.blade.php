<x-app-layout>
    @guest
    <section class="tw-w-screen tw-h-screen">
        <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-h-full tw-w-full tw-container tw-max-w-screen-xl">
            <h1 class="tw-text-gray-800 tw-text-7xl tw-font-bold tw-mb-8 md:tw-mb-12">
                ATOXIOS</h1>
            <div class="tw-w-full tw-flex tw-flex-col sm:tw-flex-row sm:tw-justify-center tw-gap-2.5">
                <a href="{{ route('register') }}" class="tw-inline-block tw-bg-gray-800 tw-font-semibold tw-text-center tw-rounded-lg tw-border tw-border-white tw-text-white tw-px-8 tw-py-3">新規登録</a>
                <a href="{{ route('login') }}" class="tw-inline-block tw-bg-white tw-font-semibold tw-text-center tw-rounded-lg tw-border tw-border-gray-800 tw-text-gray-800 tw-px-8 tw-py-3">ログイン</a>
            </div>
        </div>
    </section>
    @endguest
</x-app-layout>