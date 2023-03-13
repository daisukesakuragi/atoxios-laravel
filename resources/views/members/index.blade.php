
<x-app-layout>
    <section class="tw-py-16 lg:tw-py-32 tw-bg-base-100">
        <div class="tw-container tw-max-w-screen-xl">
            <x-page-title title="出品者一覧" subtitle="Members"></x-page-title>
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-4 tw-gap-8 lg:tw-gap-16 tw-mb-12">
                @foreach ($members as $member)
                <x-member-card :member="$member"></x-member-card>
                @endforeach
            </div>
            {{ $members->links() }}
        </div>
    </section>
</x-app-layout>