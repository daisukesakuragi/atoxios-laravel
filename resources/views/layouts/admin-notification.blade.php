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