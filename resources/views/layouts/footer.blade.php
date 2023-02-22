<footer class="tw-border-t tw-border-gray-200">
    <div class="tw-container tw-flex tw-flex-col tw-flex-wrap tw-py-16 tw-mx-auto tw-gap-8 tw-max-w-screen-lg md:tw-items-center lg:tw-items-start md:tw-flex-row md:tw-flex-nowrap">
        <div class="tw-justify-between tw-w-full tw-mt-4 tw-text-center lg:tw-flex">
            <div class="tw-text-center tw-mb-4">
                <a href="{{ route('welcome') }}">
                    <x-application-logo class="tw-block tw-h-20 tw-mb-2 tw-w-auto tw-fill-current tw-text-gray-600 tw-mx-auto" />
                </a>
                <div class="tw-flex tw-justify-center tw-mt-12 lg:tw-mt-8 tw-mb-12 tw-gap-x-4">
                    <a class="tw-cursor-pointer">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-6 tw-h-6 tw-text-blue-600" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    <a class="tw-cursor-pointer" href="https://twitter.com/ATOXIOS_PR" target="_blank" rel="noopener">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-6 tw-h-6 tw-text-blue-300" viewBox="0 0 24 24">
                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                        </svg>
                    </a>
                    <a class="tw-cursor-pointer" href="https://www.instagram.com/atoxios_pr" target="_blank" rel="noopener">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-6 tw-h-6 tw-text-pink-400" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="tw-w-full tw-px-4 lg:tw-w-1/3 md:tw-w-1/2">
                <h2 class="tw-mb-6 tw-font-bold tw-tracking-widest tw-text-gray-900">
                    Useful Links
                </h2>
                <ul class="tw-mb-8 tw-space-y-4 tw-text-sm tw-list-none">
                    <li>
                        <a class="tw-text-gray-600 hover:tw-text-gray-800" href="{{ route('members.index') }}">出品者一覧</a>
                    </li>
                    <li>
                        <a class="tw-text-gray-600 hover:tw-text-gray-800" href="{{ route('plans.index') }}">企画一覧</a>
                    </li>
                    <li>
                        <a class="tw-text-gray-600 hover:tw-text-gray-800" href="{{ route('articles.index') }}">記事一覧</a>
                    </li>
                </ul>
            </div>
            <div class="tw-w-full tw-px-4 lg:tw-w-1/3 md:tw-w-1/2">
                <h2 class="tw-mb-6 tw-font-bold tw-tracking-widest tw-text-gray-900">
                    Useful Links
                </h2>
                <ul class="tw-mb-8 tw-space-y-4 tw-text-sm tw-list-none">
                    <li>
                        <a href="{{ route('about-us') }}" class="tw-text-gray-600 hover:tw-text-gray-800">会社概要</a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}" class="tw-text-gray-600 hover:tw-text-gray-800">利用規約</a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}" class="tw-text-gray-600 hover:tw-text-gray-800">プライバシーポリシー</a>
                    </li>
                    <li>
                        <a href="{{ route('tokushoho') }}" class="tw-text-gray-600 hover:tw-text-gray-800">特定商取引法に基づく表記</a>
                    </li>
                </ul>
            </div>
            <div class="tw-w-full tw-px-4 lg:tw-w-1/3 md:tw-w-1/2">
                <h2 class="tw-mb-6 tw-font-bold tw-tracking-widest tw-text-gray-900">
                    Useful Links
                </h2>
                <ul class="tw-mb-8 tw-space-y-4 tw-text-sm tw-list-none">
                    <li>
                        <a class="tw-text-gray-600 hover:tw-text-gray-800">お問合せ</a>
                    </li>
                    <li>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdhTmpE9c6uc7pk-hXjauA6GRQ6RtJCNCLudwyqznds4Wzysg/viewform" target="_blank
                        " rel="noopener" class="tw-text-gray-600 hover:tw-text-gray-800">出品を希望される方へ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="tw-flex tw-justify-center tw-pb-4">
        <p class="tw-text-gray-800 tw-text-sm">
            All rights reserved by @ ATOXIOS 2022
        </p>
    </div>
</footer>