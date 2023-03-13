<!-- @if(Auth::check())
<nav x-data="{ open: false }" class="tw-bg-white tw-border-b tw-border-gray-100 tw-sticky tw-top-0 tw-z-40 tw-shadow">
    <div class="tw-mx-auto tw-px-4 tw-container tw-max-w-screen-xl">
        <div class="tw-flex tw-justify-between tw-h-16">
            <div class="tw-flex">
                <div class="shrink-0 tw-flex tw-items-center">
                    <a href="{{ route('welcome') }}">
                        <strong class="tw-text-xl">ATOXIOS</strong>
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
                        <x-dropdown-link :href="route('account.showBidHistory')">
                            入札履歴
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
        <div class="tw-pt-2 tw-pb-1 tw-border-t tw-border-gray-200">
            <div class="tw-px-4 tw-py-4 tw-border-b tw-border-gray-200 tw-mb-4">
                <div class="tw-font-medium tw-text-base tw-text-gray-800">{{ Auth::user()->name }}</div>
                <div class="tw-font-medium tw-text-sm tw-text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="tw-space-y-1 tw-pb-4">
                <x-responsive-nav-link :href="route('account.index')" :active="request()->routeIs('account.index')">
                    アカウント
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('account.showBidHistory')" :active="request()->routeIs('account.showBidHistory')">
                    入札履歴
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
@else
<nav x-data="{ open: false }" class="tw-bg-white tw-border-b tw-border-gray-100 tw-shadow tw-sticky tw-top-0 tw-z-40">
    <div class="tw-mx-auto tw-px-4 tw-container tw-max-w-screen-xl">
        <div class="tw-flex tw-justify-between tw-h-16">
            <div class="tw-flex">
                <div class="shrink-0 tw-flex tw-items-center">
                    <a href="{{ route('welcome') }}">
                        <strong class="tw-text-xl">ATOXIOS</strong>
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
        <div class="tw-pt-2 tw-pb-1 tw-border-t tw-border-gray-200">
            <div class="tw-px-4">
                {{-- <div class="tw-font-medium tw-text-base tw-text-gray-800">{{ Auth::user()->name }}
            </div>
            <div class="tw-font-medium tw-text-sm tw-text-gray-500">{{ Auth::user()->email }}</div> --}}
        </div>
        <div class="tw-space-y-1">
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
@endif -->
<div class="tw-navbar tw-bg-base-100 tw-sticky tw-left-0 tw-top-0 tw-z-50">
    <div class="tw-navbar-start">
      <div class="tw-dropdown">
        <label tabindex="0" class="tw-btn tw-btn-ghost tw-btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-5 tw-w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
        </label>
        <ul tabindex="0" class="tw-menu tw-menu-compact tw-dropdown-content tw-mt-3 tw-p-2 tw-shadow tw-bg-base-100 tw-rounded-box tw-w-52">
          <li><a href="{{ route('members.index') }}">出品者一覧</a></li>
          <li><a href="{{ route('plans.index') }}">企画一覧</a></li>
          <li><a href="{{ route('articles.index') }}">記事一覧</a></li>
        </ul>
      </div>
    </div>
    <div class="tw-navbar-center">
      <a href="{{ route('welcome') }}" class="tw-btn tw-btn-ghost tw-normal-case tw-font-bold tw-text-xl">ATOXIOS</a>
    </div>
    <div class="tw-navbar-end">
      <button class="tw-btn tw-btn-ghost tw-btn-circle">
        <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-5 tw-w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
      </button>
      <button class="tw-btn tw-btn-ghost tw-btn-circle">
        <div class="tw-indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-5 tw-w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
          <span class="badge badge-xs badge-primary indicator-item"></span>
        </div>
      </button>
    </div>
  </div>