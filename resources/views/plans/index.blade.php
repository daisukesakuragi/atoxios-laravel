<x-app-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-xl">
            <x-page-title title="企画一覧" subtitle="PLANS"></x-page-title>
            @if(count($plans) > 0)
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($plans as $plan)
                <x-plan-card :plan="$plan"></x-plan-card>
                @endforeach
            </div>
            {{ $plans->links() }}
            @else
            <div class="tw-alert tw-shadow-lg">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('企画のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @endif
        </div>
    </section>
</x-app-layout>