<a href="{{ route('members.show', $member->slug) }}" class="tw-block tw-text-center tw-mx-auto hover:tw-opacity-50 tw-transition-opacity">
    <div class="tw-avatar tw-mb-8">
        <div class="tw-w-44 tw-h-44 tw-ring tw-ring-primary tw-ring-offset-base-100 tw-ring-offset-2 tw-rounded-full">
            <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" class="tw-object-cover tw-object-center">
        </div>
    </div>
    <p class="tw-font-bold tw-text-lg lg:tw-text-xl">{{ $member->name }}</p>
</a>
