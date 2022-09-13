@if (session()->has('success'))
<div class="tw-bg-green-500 tw-text-white tw-w-screen">
    <div class="tw-p-4 tw-container tw-max-w-screen-xl tw-flex tw-items-center tw-gap-x-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg><span class="tw-font-semibold tw-text-sm">{{ session()->get('success') }}</span>
    </div>
</div>
@elseif (session()->has('error'))
<div class="tw-bg-red-600 tw-text-white tw-w-screen">
    <div class="tw-p-4 tw-container tw-max-w-screen-xl tw-flex tw-items-center tw-gap-x-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg><span class="tw-font-semibold tw-text-sm">{{ session()->get('error') }}</span>
    </div>
</div>
@endif