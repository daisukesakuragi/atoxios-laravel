@if (session()->has('success'))
<div class="tw-bg-green-500 tw-text-white tw-w-screen">
    <div class="tw-p-4 tw-container tw-max-w-screen-xl tw-flex tw-items-center tw-gap-x-1">
        <p class="tw-font-semibold tw-text-sm">{{ session()->get('success') }}</p>
    </div>
</div>
@elseif (session()->has('error'))
<div class="tw-bg-red-600 tw-text-white tw-w-screen">
    <div class="tw-p-4 tw-container tw-max-w-screen-xl tw-flex tw-items-center tw-gap-x-1">
        <p class="tw-font-semibold tw-text-sm">{{ session()->get('error') }}</p>
    </div>
</div>
@endif
@if (session()->has('status'))
<div class="tw-alert tw-alert-success tw-shadow-lg tw-rounded-none">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="tw-stroke-current tw-flex-shrink-0 tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span class="tw-font-bold tw-text-sm">{{ session('status') }}</span>
    </div>
</div>
@endif
@if (count($errors))
<div class="tw-alert tw-alert-error tw-shadow-lg tw-rounded-none">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="tw-stroke-current tw-flex-shrink-0 tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span class="tw-font-bold tw-text-sm">{{ __('エラーが発生しました。') }}</span>
    </div>
</div>
@endif
