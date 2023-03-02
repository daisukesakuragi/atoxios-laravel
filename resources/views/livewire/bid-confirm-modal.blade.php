<x-modal wire:model="show">
    <div class="tw-relative tw-transform tw-overflow-hidden tw-rounded-lg tw-bg-white tw-text-left tw-shadow-xl tw-transition-all sm:tw-my-8 sm:tw-w-full sm:tw-max-w-lg">
        <div class="tw-bg-white tw-px-4 tw-pt-5 tw-pb-4 sm:tw-p-6 sm:tw-pb-4">
            <div class="sm:tw-flex sm:tw-items-start">
                <div class="tw-mx-auto tw-flex tw-h-12 tw-w-12 tw-flex-shrink-0 tw-items-center tw-justify-center tw-rounded-full tw-bg-red-100 sm:tw-mx-0 sm:tw-h-10 sm:tw-w-10">
                    <svg class="tw-h-6 tw-w-6 tw-text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                    </svg>
                </div>
                <div class="tw-mt-3 sm:tw-mt-0 sm:tw-ml-4">
                    <h3 class="tw-text-lg tw-text-center lg:tw-text-left tw-font-medium tw-leading-6 tw-text-gray-900 tw-mb-4" id="modal-title">{{ __('こちらの企画に入札しますか？') }}</h3>
                    <p class="tw-text-sm tw-text-gray-500 tw-mb-2">{{ __('下記の「入札を実行する」ボタンをクリックしていただくと、' . $plan->title . 'に' . $price . '円で入札することができます。') }}</p>
                    <p class="tw-text-sm tw-text-red-600 tw-font-bold">{{ __('*この操作は後から取り消すことができません。') }}</p>
                </div>
            </div>
        </div>
        <div class="tw-bg-gray-50 tw-px-4 tw-py-3 sm:tw-flex sm:tw-flex-row-reverse sm:tw-px-6">
            <button type="button" onclick="onClickBidButton()" class="tw-mt-3 tw-inline-flex tw-w-full tw-justify-center tw-rounded-md tw-border tw-border-gray-300 tw-bg-indigo-700 tw-px-4 tw-py-2 tw-text-base tw-font-medium tw-text-white tw-shadow-sm hover:tw-bg-indigo-700 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-indigo-500 focus:tw-ring-offset-2 sm:tw-mt-0 sm:tw-ml-3 sm:tw-w-auto sm:tw-text-sm" wire:click="bid">{{ __('入札を実行する') }}</button>
            <button type="button" class="tw-mt-3 tw-inline-flex tw-w-full tw-justify-center tw-rounded-md tw-border tw-border-gray-300 tw-bg-white tw-px-4 tw-py-2 tw-text-base tw-font-medium tw-text-gray-700 tw-shadow-sm hover:tw-bg-gray-50 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-indigo-500 focus:tw-ring-offset-2 sm:tw-mt-0 sm:tw-ml-3 sm:tw-w-auto sm:tw-text-sm" x-on:click="show = false">{{ __('キャンセルする') }}</button>
        </div>
    </div>
</x-modal>