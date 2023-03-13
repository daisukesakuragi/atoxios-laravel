
<x-app-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-xl">
            <x-page-title title="出品者一覧" subtitle="MEMBERS"></x-page-title>
            @if(count($members) > 0)
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-4 tw-gap-8 lg:tw-gap-16 tw-mb-12">
                @foreach ($members as $member)
                <x-member-card :member="$member"></x-member-card>
                @endforeach
            </div>
            {{ $members->links() }}
            @else
            <div class="tw-alert tw-shadow-lg">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('出品者のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @endif
        </div>
    </section>
</x-app-layout>