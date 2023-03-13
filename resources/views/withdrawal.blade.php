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
            <p>
                退会できません
            </p>
            <p>
                現在開催中のオークションに、{{ auth()->user()->name }}様が入札されている記録を検知しました。
            </p>
            <p>大変申し訳ございませんが、該当するオークションが終了するまで、ATOXIOSを退会することができません。</p>
            @endif
        </div>
    </section>
</x-app-layout>