<x-app-layout>
    <section class="tw-py-16 lg:tw-py-32 tw-bg-base-100">
        <div class="tw-container tw-max-w-screen-xl">
            <x-page-title title="企画一覧" subtitle="PLANS"></x-page-title>
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
                @foreach ($plans as $plan)
                <x-plan-card :plan="$plan"></x-plan-card>
                @endforeach
            </div>
            {{ $plans->links() }}
        </div>
    </section>
</x-app-layout>