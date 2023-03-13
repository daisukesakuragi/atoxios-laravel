<a href="{{ route('members.show', $member->slug) }}" class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-w-full">
    <div class="tw-avatar tw-mb-8">
        <div class="tw-w-full tw-max-w-xs tw-ring tw-ring-primary tw-ring-offset-base-100 tw-ring-offset-2 tw-rounded-full">
            <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" class="tw-object-cover tw-object-center" loading="lazy">
        </div>
    </div>
    <p class="tw-font-bold tw-text-lg lg:tw-text-xl">{{ $member->name }}</p>
</a>