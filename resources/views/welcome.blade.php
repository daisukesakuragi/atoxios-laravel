<x-app-layout>
    <section class=" tw-bg-indigo-700 tw-w-screen tw-h-screen">
        <div
            class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-h-full tw-w-full tw-container tw-max-w-screen-xl">
            <h1 class="tw-text-indigo-50 tw-text-7xl tw-font-bold tw-mb-8 md:tw-mb-12">
                ATOXIOS</h1>
            <div class="tw-w-full tw-flex tw-flex-col sm:tw-flex-row sm:tw-justify-center tw-gap-2.5">
                <a href="{{ route('register') }}"
                    class="tw-inline-block tw-bg-indigo-700 tw-font-semibold tw-text-center tw-rounded-lg tw-border tw-border-white tw-text-white tw-px-8 tw-py-3">会員登録</a>

                <a href="{{ route('login') }}"
                    class="tw-inline-block tw-bg-white tw-font-semibold tw-text-center tw-rounded-lg tw-text-indigo-700 tw-px-8 tw-py-3">ログイン</a>
            </div>
        </div>
    </section>
</x-app-layout>