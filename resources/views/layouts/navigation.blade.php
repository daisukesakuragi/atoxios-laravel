@if (Route::is('admin.*'))
<nav x-data="{ open: false }" class="tw-bg-white tw-border-b tw-border-gray-100 tw-sticky tw-top-0 tw-z-40 tw-shadow">
    <div class="tw-mx-auto tw-px-4 tw-container tw-max-w-screen-xl">
        <div class="tw-flex tw-justify-between tw-h-16">
            <div class="tw-flex">
                <div class="shrink-0 tw-flex tw-items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="tw-block tw-h-10 tw-w-auto tw-fill-current tw-text-gray-600" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
@elseif(!Route::is('admin.*') && Auth::guard('web')->check())
<nav x-data="{ open: false }" class="tw-bg-white tw-border-b tw-border-gray-100 tw-sticky tw-top-0 tw-z-40 tw-shadow">
    <div class="tw-mx-auto tw-px-4 tw-container tw-max-w-screen-xl">
        <div class="tw-flex tw-justify-between tw-h-16">
            <div class="tw-flex">
                <div class="shrink-0 tw-flex tw-items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="tw-block tw-h-10 tw-w-auto tw-fill-current tw-text-gray-600" />
                    </a>
                </div>
                <div class="tw-hidden tw-space-x-8 sm:tw--my-px sm:tw-ml-10 sm:tw-flex">
                    <x-nav-link :href="route('members.index')" :active="request()->routeIs('members.index')">
                        {{ __('出品者一覧') }}
                    </x-nav-link>
                    <x-nav-link :href="route('plans.index')" :active="request()->routeIs('plans.index')">
                        {{ __('企画一覧') }}
                    </x-nav-link>
                    <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                        {{ __('記事一覧') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="tw-hidden sm:tw-flex sm:tw-items-center sm:tw-ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="tw-flex tw-items-center tw-text-sm tw-font-medium tw-text-gray-500 hover:tw-text-gray-700 hover:tw-border-gray-300 focus:tw-outline-none focus:tw-text-gray-700 focus:tw-border-gray-300 tw-transition tw-duration-150 tw-ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="tw-ml-1">
                                <svg class="tw-fill-current tw-h-4 tw-w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('account.index')">
                            アカウント
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('ログアウト') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <div class="tw--mr-2 tw-flex tw-items-center sm:tw-hidden">
                <button @click="open = ! open" class="tw-inline-flex tw-items-center tw-justify-center tw-p-2 tw-rounded-md tw-text-gray-400 hover:tw-text-gray-500 hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-bg-gray-100 focus:tw-text-gray-500 tw-transition tw-duration-150 tw-ease-in-out">
                    <svg class="tw-h-6 tw-w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'tw-hidden': open, 'tw-inline-flex': !open }" class="tw-inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'tw-hidden': !open, 'tw-inline-flex': open }" class="tw-hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div :class="{ 'tw-block': open, 'tw-hidden': !open }" class="tw-hidden sm:tw-hidden">
        <div class="tw-pt-2 tw-pb-3 tw-space-y-1">
            <x-responsive-nav-link :href="route('members.index')" :active="request()->routeIs('members.index')">
                {{ __('出品者一覧') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('plans.index')" :active="request()->routeIs('plans.index')">
                {{ __('企画一覧') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                {{ __('記事一覧') }}
            </x-responsive-nav-link>
        </div>
        <div class="tw-pt-4 tw-pb-1 tw-border-t tw-border-gray-200">
            <div class="tw-px-4">
                <div class="tw-font-medium tw-text-base tw-text-gray-800">{{ Auth::user()->name }}</div>
                <div class="tw-font-medium tw-text-sm tw-text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="tw-mt-3 tw-space-y-1">
                <x-responsive-nav-link :href="route('account.index')">
                    アカウント
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
@elseif(!Route::is('admin.*') && !Auth::guard('web')->check())
<nav x-data="{ open: false }" class="tw-bg-white tw-border-b tw-border-gray-100 tw-shadow tw-sticky tw-top-0 tw-z-40">
    <div class="tw-mx-auto tw-px-4 tw-container tw-max-w-screen-xl">
        <div class="tw-flex tw-justify-between tw-h-16">
            <div class="tw-flex">
                <div class="shrink-0 tw-flex tw-items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="tw-block tw-h-10 tw-w-auto tw-fill-current tw-text-gray-600" />
                    </a>
                </div>
                <div class="tw-hidden tw-items-center tw-space-x-8 sm:tw--my-px sm:tw-ml-10 sm:tw-flex">
                    <x-nav-link :href="route('members.index')" :active="request()->routeIs('members.index')">
                        {{ __('出品者一覧') }}
                    </x-nav-link>
                    <x-nav-link :href="route('plans.index')" :active="request()->routeIs('plans.index')">
                        {{ __('企画一覧') }}
                    </x-nav-link>
                    <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                        {{ __('記事一覧') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="tw-hidden tw-items-center tw-space-x-8 sm:tw--my-px sm:tw-ml-10 sm:tw-flex">
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('新規登録') }}
                </x-nav-link>
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('ログイン') }}
                </x-nav-link>
            </div>
            <div class="tw--mr-2 tw-flex tw-items-center sm:tw-hidden">
                <button @click="open = ! open" class="tw-inline-flex tw-items-center tw-justify-center tw-p-2 tw-rounded-md tw-text-gray-400 hover:tw-text-gray-500 hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-bg-gray-100 focus:tw-text-gray-500 tw-transition tw-duration-150 tw-ease-in-out">
                    <svg class="tw-h-6 tw-w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'tw-hidden': open, 'tw-inline-flex': !open }" class="tw-inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'tw-hidden': !open, 'tw-inline-flex': open }" class="tw-hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div :class="{ 'tw-block': open, 'tw-hidden': !open }" class="tw-hidden sm:tw-hidden">
        <div class="tw-pt-2 tw-pb-3 tw-space-y-1">
            <x-responsive-nav-link :href="route('members.index')" :active="request()->routeIs('members.index')">
                {{ __('出品者一覧') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('plans.index')" :active="request()->routeIs('plans.index')">
                {{ __('企画一覧') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                {{ __('記事一覧') }}
            </x-responsive-nav-link>
        </div>
        <div class="tw-pt-4 tw-pb-1 tw-border-t tw-border-gray-200">
            <div class="tw-px-4">
                {{-- <div class="tw-font-medium tw-text-base tw-text-gray-800">{{ Auth::user()->name }}
            </div>
            <div class="tw-font-medium tw-text-sm tw-text-gray-500">{{ Auth::user()->email }}</div> --}}
        </div>
        <div class="tw-mt-3 tw-space-y-1">
            <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('会員登録') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('ログイン') }}
            </x-responsive-nav-link>
        </div>
    </div>
    </div>
</nav>
@endif