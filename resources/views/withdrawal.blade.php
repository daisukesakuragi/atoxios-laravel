<x-app-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-page-title title="退会" subtitle="WITHDRAWAL"></x-page-title>
            @if($is_withdrawalable)
            <form method="POST" action="{{ route('account.withdrawal') }}">
                @csrf
                <div class="tw-form-control tw-w-full tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('退会理由') }}</span>
                    </label>
                    <select class="tw-select tw-select-bordered" name="reason">
                        <option value="">選択してください</option>
                        <option value="0">理由1</option>
                        <option value="1">理由2</option>
                        <option value="2">理由3</option>
                    </select>
                </div>
                <div class="tw-form-control tw-mb-8">
                    <label class="tw-label">
                      <span class="tw-label-text">ご意見・ご要望</span>
                    </label>
                    <textarea class="tw-textarea tw-textarea-bordered" rows="7" placeholder="ATOXIOSに対するご意見・ご要望等がございましたら、こちらに記入してください。" name="content"></textarea>
                </div>       
                <div class="tw-text-center">
                    <button type="submit" class="tw-btn tw-btn-block tw-btn-primary tw-mb-4">{{ __('退会する') }}</button>
                </div>         
            </form>
            @else
            <div class="tw-alert tw-alert-error tw-shadow-lg tw-flex-row">
                <div class="tw-flex tw-flex-col tw-items-start">
                    <div class="tw-flex tw-items-center tw-gap-2 tw-mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="tw-stroke-current tw-flex-shrink-0 tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <div class="tw-font-bold tw-text-lg">退会できません</div>
                    </div>
                    <p class="tw-text-sm">現在開催中のオークションに{{ auth()->user()->name }}様が入札されている記録を検知しました。</p>
                    <p class="tw-text-sm tw-mb-2">大変申し訳ございませんが、該当するオークションが終了するまで、ATOXIOSを退会することができません。</p>
                    <div class="tw-flex tw-justify-end tw-w-full">
                        <a href="{{ route('terms-of-use') }}" class="tw-btn tw-btn-sm">利用規約はこちら</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</x-app-layout>