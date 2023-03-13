<div class="tw-card tw-bg-base-100 tw-shadow-xl">
    <figure><img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}"></figure>
    <div class="tw-card-body">
        <h2 class="tw-card-title">{{ $plan->title }}</h2>
        <p>by <a href="{{ route('members.show', $plan->member->slug) }}" class="tw-underline">{{ $plan->member->name }}</a></p>
        <div class="tw-card-actions tw-justify-end">
            <a href="{{ route('plans.show', $plan->slug) }}" class="tw-btn tw-btn-primary">詳細はこちら</a>
        </div>
    </div>
</div>