<x-modal wire:model="show" class="tw-modal">
    <div class="tw-modal-box" x-cloak>
        <p class="tw-flex tw-items-center tw-gap-2 tw-mb-4">
            <svg class="tw-h-8 tw-w-8 tw-text-error" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
            </svg>
            <span class="tw-font-bold tw-text-xl">
                {{ __('この企画に入札しますか？') }}
            </span>
        </p>
        <p class="tw-text-left tw-mb-4">{{ 'こちらの企画に' . number_format($price) . '円で入札される場合は、「入札する」ボタンをクリックしてください。' }}</p>
        <p class="tw-text-sm tw-text-error tw-text-left tw-font-bold">{{ __('*この操作は後から取り消すことができません。') }}</p>
        <div class="tw-modal-action tw-flex-col tw-gap-4">
            <button type="button" onclick="onClickBidButton()" class="tw-btn tw-btn-primary tw-btn-block" wire:click="bid" wire:loading.attr="disabled">{{ __('入札する') }}</button>
            <button type="button" class="tw-btn-link tw-btn-block" x-on:click="show = false">{{ __('キャンセルする') }}</button>
        </div>    
    </div>
</x-modal>