@auth
@if(auth()->user()->email_verified_at)
@if($plan->checkIfPlanIsBiddableByDateTime())
<button x-data="{}" x-on:click="window.livewire.emitTo('bid-confirm-modal', 'show')" class="tw-btn tw-btn-primary tw-btn-block">
    <!-- {{ number_format($price) . '円で入札する' }} -->
    {{ __('+5,000円で入札する') }}
</button>
@else
<p class="tw-btn tw-btn-disabled tw-btn-block">
    {{ __('入札できません') }}
</p>
@endif
@elseif(!auth()->user()->email_verified_at)
<hr class="tw-my-6">
<div class="tw-p-4 tw-text-red-900 tw-bg-red-100 tw-border tw-border-red-200 tw-rounded">
    <div class="tw-flex tw-justify-between tw-flex-wrap">
        <div class="tw-w-0 tw-flex-1 tw-flex">
            <div class="tw-w-full">
                <p class="tw-font-semibold tw-text-md tw-mb-4">
                    {{ __('メールアドレスが認証されていません。') }}
                </p>
                <p class="tw-text-sm tw-mb-2">
                    {{__('ご登録いただいたメールアドレスの認証が完了していないため、こちらの企画に入札していただくことができません。')}}
                </p>
                <p class="tw-text-sm tw-mb-2">
                    {{ __('お手数ですが、ご登録いただいたメールアドレスに送信されている認証用のメールをご確認いただき、ご登録いただいたメールアドレスの認証を完了してください。') }}
                </p>
                <p class="tw-text-sm tw-mb-6">
                    {{ __('もし認証用のメールが届いていない場合は、下記の「メールアドレスを認証する」ボタンをクリックしていただき、認証用のメールを再送させていただくことが可能です。')}}
                </p>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <a :href="route('verification.send')" onclick="event.preventDefault();
                                    this.closest('form').submit();" class="tw-w-full tw-cursor-pointer tw-font-bold tw-inline-flex tw-justify-center tw-rounded tw-border tw-border-transparent tw-shadow-sm tw-px-4 tw-py-2 tw-bg-red-600 tw-text-base tw-text-white">
                        {{ __('メールアドレスを認証する') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@else
<a href="{{ route('login') }}" class="tw-btn tw-btn-accent tw-btn-block">
    {{ __('ログインして入札する') }}
</a>
@endauth
