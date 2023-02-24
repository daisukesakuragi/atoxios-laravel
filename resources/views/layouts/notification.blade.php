@if (session()->has('success'))
<div class="tw-bg-green-500 tw-text-white tw-w-screen">
    <div class="tw-p-4 tw-container tw-max-w-screen-xl">
        <p class="tw-font-semibold tw-text-sm">{{ session()->get('success') }}</p>
    </div>
</div>
@elseif (session()->has('error'))
<div class="tw-bg-red-600 tw-text-white tw-w-screen">
    <div class="tw-p-4 tw-container tw-max-w-screen-xl">
        <p class="tw-font-semibold tw-text-sm">{{ session()->get('error') }}</p>
    </div>
</div>
@endif
@auth
@if(!auth()->user()->email_verified_at && !session()->has('success') && !session()->has('error'))
<div class="tw-bg-red-600 tw-text-white tw-w-screen">
    <div class="tw-p-4 tw-container tw-max-w-screen-xl tw-flex tw-items-center tw-gap-x-4">
        <p class="tw-font-semibold tw-text-sm">
            {{ __('メールアドレスが未認証です。') }}
        </p>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <a :href="route('verification.send')" onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="tw-cursor-pointer tw-font-bold tw-inline-flex tw-justify-center tw-rounded tw-border tw-border-white tw-shadow-sm tw-px-4 tw-py-2 tw-bg-red-600 tw-text-white tw-text-sm">
                {{ __('認証する') }}
            </a>
        </form>
    </div>
</div>
@endif
@endauth