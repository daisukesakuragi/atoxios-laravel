@if (session()->has('success'))
<div class="tw-alert tw-alert-success tw-shadow-lg tw-rounded-none">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="tw-stroke-current tw-flex-shrink-0 tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span class="tw-font-bold tw-text-sm">{{ session()->get('success') }}</span>
    </div>
</div>
@elseif (session()->has('error'))
<div class="tw-alert tw-alert-error tw-shadow-lg tw-rounded-none">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="tw-stroke-current tw-flex-shrink-0 tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span class="tw-font-bold tw-text-sm">{{ session()->get('error') }}</span>
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
