<div x-data="{ show: @entangle($attributes->wire('model')).defer }" x-show="show" x-on:keydown.escape.window="show = false" class="tw-relative tw-z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="tw-fixed tw-inset-0 tw-bg-gray-500 tw-bg-opacity-75 tw-transition-opacity"></div>
    <div class="tw-fixed tw-inset-0 tw-z-10 tw-overflow-y-auto">
        <div class="tw-flex tw-min-h-full tw-items-center tw-justify-center tw-p-4 tw-text-center sm:tw-items-center sm:tw-p-0">
            {{ $slot }}
        </div>
    </div>
</div>