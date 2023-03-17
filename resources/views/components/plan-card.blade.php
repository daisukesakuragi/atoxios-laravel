<div class="tw-card tw-text-base-content tw-glass">
    <figure><img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}" class="tw-h-60 tw-w-full tw-object-cover"></figure>
    <div class="tw-card-body">
        <x-plan-status-badge :plan="$plan"></x-plan-status-badge>
        <h2 class="tw-card-title">{{ $plan->title }}</h2>
        <p class="tw-text-sm">by <a href="{{ route('members.show', $plan->member->slug) }}" class="tw-underline">{{ $plan->member->name }}</a></p>
        <div class="tw-card-actions tw-justify-end">
            <a href="{{ route('plans.show', $plan->slug) }}" class="tw-btn tw-btn-primary">詳細はこちら</a>
        </div>
    </div>
</div>
