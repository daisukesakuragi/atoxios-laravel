<x-app-layout>
    <div class="tw-py-12 tw-container tw-max-w-screen-xl">
        <h1 class="tw-text-center tw-text-xl tw-mb-8">
            退会
        </h1>
        @if($is_withdrawalable)
        <x-auth-card>
            <!-- <x-auth-session-status class="tw-mb-4" :status="session('status')" /> -->
            <x-auth-validation-errors class="tw-mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('account.withdrawal') }}">
                @csrf
                <div class="tw-mb-4">
                    <x-label for="reason" :value="__('退会理由')" />
                    <x-select class="tw-w-full tw-mt-1" name="reason" id="reason">
                        <option value="">選択してください</option>
                        <option value="0">理由1</option>
                        <option value="1">理由2</option>
                        <option value="2">理由3</option>
                    </x-select>
                </div>
                <div>
                    <x-label for="email" :value="__('ご意見・ご要望')" />
                    <x-textarea class="tw-w-full tw-mt-1" rows="7" :placeholder="__('ATOXIOSに対するご意見・ご要望等がございましたら、こちらに記入してください。')" name="content" id="content"></x-textarea>
                </div>
                <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                    <x-button class="tw-ml-3">
                        {{ __('退会する') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
        @else
        <p>
            退会できません
        </p>
        <p>
            現在開催中のオークションに、{{ auth()->user()->name }}様が入札されている記録を検知したため、退会できません。
        </p>
        @endif
    </div>
</x-app-layout>