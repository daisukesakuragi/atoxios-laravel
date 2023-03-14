@auth
<header class="tw-navbar tw-bg-base-100">
    <div class="tw-navbar-start">
        <a href="{{ route('admin.dashboard') }}" class="tw-btn tw-btn-ghost tw-normal-case tw-text-xl tw-font-bold">ATOXIOS ADMIN</a>
    </div>
    <div class="tw-navbar-center">
        <ul class="tw-menu tw-menu-horizontal tw-px-1">
            <li>
                <a href="{{ route('admin.users.index') }}">
                    {{ __('全てのユーザー') }}
                </a>
            </li>
            <li>
                <a href="{{ route('admin.bids.index') }}">
                    {{ __('入札履歴') }}
                </a>
            </li>
            <li tabindex="0">
                <a>
                    出品者
                    <svg class="tw-fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </a>
                <ul class="tw-p-2 tw-bg-base-300 tw-rounded-xl">
                    <li><a href="{{ route('admin.members.index') }}">{{ __('全ての出品者') }}</a></li>
                    <li><a href="{{ route('admin.members.create') }}">{{ __('出品者の新規作成') }}</a></li>
                </ul>
            </li>
            <li tabindex="0">
                <a>
                    企画
                    <svg class="tw-fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </a>
                <ul class="tw-p-2 tw-bg-base-300 tw-rounded-xl">
                    <li><a href="{{ route('admin.plans.index') }}">{{ __('全ての企画') }}</a></li>
                    <li><a href="{{ route('admin.plans.create') }}">{{ __('企画の新規作成') }}</a></li>
                </ul>
            </li>
            <li tabindex="0">
                <a>
                    記事
                    <svg class="tw-fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </a>
                <ul class="tw-p-2 tw-bg-base-300 tw-rounded-xl">
                    <li><a href="{{ route('admin.plans.index') }}">{{ __('全ての記事') }}</a></li>
                    <li><a href="{{ route('admin.plans.create') }}">{{ __('記事の新規作成') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="tw-navbar-end">
        <div class="tw-dropdown tw-dropdown-end">
            <label tabindex="0" class="tw-btn tw-btn-ghost tw-btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tw-h-5 tw-w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>          
            </label>
            <ul tabindex="0" class="tw-menu tw-dropdown-content tw-mt-3 tw-p-2 tw-shadow tw-bg-base-300 tw-rounded-box tw-w-52">
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