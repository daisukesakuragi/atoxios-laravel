@auth
<header class="tw-navbar tw-bg-base-100">
    <div class="tw-navbar-start">
        <a href="{{ route('admin.dashboard') }}" class="tw-btn tw-btn-ghost tw-normal-case tw-text-xl tw-font-bold tw-rounded-none">ATOXIOS ADMIN</a>
    </div>
    <div class="tw-navbar-center">
        <ul class="tw-menu tw-menu-horizontal tw-px-1">
            <li>
                <a href="{{ route('admin.users.index') }}" class="tw-text-sm">
                    {{ __('全てのユーザー') }}
                </a>
            </li>
            <li>
                <a href="{{ route('admin.bids.index') }}" class="tw-text-sm">
                    {{ __('全ての入札履歴') }}
                </a>
            </li>
            <li tabindex="0">
                <a class="tw-text-sm">
                    出品者
                    <svg class="tw-fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </a>
                <ul class="tw-p-2 tw-bg-base-300">
                    <li><a href="{{ route('admin.members.index') }}" class="tw-text-sm">{{ __('全ての出品者') }}</a></li>
                    <li><a href="{{ route('admin.members.create') }}" class="tw-text-sm">{{ __('出品者の新規作成') }}</a></li>
                </ul>
            </li>
            <li tabindex="0">
                <a class="tw-text-sm">
                    企画
                    <svg class="tw-fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </a>
                <ul class="tw-p-2 tw-bg-base-300">
                    <li><a href="{{ route('admin.plans.index') }}" class="tw-text-sm">{{ __('全ての企画') }}</a></li>
                    <li><a href="{{ route('admin.plans.create') }}" class="tw-text-sm">{{ __('企画の新規作成') }}</a></li>
                </ul>
            </li>
            <li tabindex="0">
                <a class="tw-text-sm">
                    記事
                    <svg class="tw-fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </a>
                <ul class="tw-p-2 tw-bg-base-300">
                    <li><a href="{{ route('admin.articles.index') }}" class="tw-text-sm">{{ __('全ての記事') }}</a></li>
                    <li><a href="{{ route('admin.articles.create') }}" class="tw-text-sm">{{ __('記事の新規作成') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="tw-navbar-end">
        <div class="tw-dropdown tw-dropdown-end">
            <label tabindex="0" class="tw-btn tw-btn-ghost tw-rounded-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tw-w-6 tw-h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                </svg>                  
            </label>
            <ul tabindex="0" class="tw-menu tw-menu-compact tw-dropdown-content tw-mt-3 tw-p-2 tw-shadow tw-bg-base-300 tw-rounded-none tw-w-52">
                <li><a href="{{ route('admin.change-email') }}">{{ __('メールアドレス変更') }}</a></li>
                <li><a href="{{ route('admin.change-password') }}">{{ __('パスワード変更') }}</a></li>
                <li>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf    
                        <a :href="route('admin.logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('ログアウト') }}
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
@endauth