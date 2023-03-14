<header class="tw-navbar tw-bg-base-100 tw-sticky tw-left-0 tw-top-0 tw-z-50">
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
        <div class="tw-dropdown tw-dropdown-end">
            <label tabindex="0" class="tw-btn tw-btn-ghost tw-btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tw-h-5 tw-w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>          
            </label>
            <ul tabindex="0" class="tw-menu tw-menu-compact tw-dropdown-content tw-mt-3 tw-p-2 tw-shadow tw-bg-base-100 tw-rounded-box tw-w-52">                
                @if(Auth::check())
                <li><a href="{{ route('account.index') }}">{{ __('アカウント') }}</a></li>
                <li><a href="{{ route('account.showBidHistory') }}">{{ __('入札履歴') }}</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf    
                        <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('ログアウト') }}
                        </a>
                    </form>
                </li>
                @else
                <li><a href="{{ route('register') }}">{{ __('会員登録') }}</a></li>
                <li><a href="{{ route('login') }}">{{ __('ログイン') }}</a></li>
                @endif
            </ul>
        </div>
    </div>
  </header>