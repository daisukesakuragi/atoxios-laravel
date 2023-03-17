@if($status === 0)
<div class="tw-badge tw-badge-info tw-badge-lg">{{ __('近日開催！') }}</div>
@elseif($status === 1)
<div class="tw-badge tw-badge-success tw-badge-lg">{{ __('開催中です') }}</div>
@elseif($status === 2)
<div class="tw-badge tw-badge-error tw-badge-lg">{{ __('終了しています') }}</div>
@endif