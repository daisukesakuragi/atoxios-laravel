<x-app-layout>
    @auth
    <livewire:bid-confirm-modal :user="auth()->user()" :plan="$plan" :price="$price" />
    @endauth
    <section class="tw-hero" style="background-image: url('{{ $plan->eyecatch_img_url }}');">
        <div class="tw-hero-overlay tw-bg-opacity-60 tw-pt-32 tw-pb-24"></div>
        <div class="tw-hero-content tw-text-center tw-text-neutral-content tw-pt-32 tw-pb-24">
            <div class="tw-max-w-screen-sm tw-mx-auto">
                <h1 class="tw-mb-2 tw-text-5xl lg:tw-text-7xl tw-font-bold tw-italic">
                    {{ $plan->title }}
                </h1>
                <div class="tw-flex tw-items-center tw-justify-end tw-gap-2 tw-mb-8">
                    <span>{{ __('by') }}</span>
                    <a href="{{ route('members.show', $plan->member->slug)}}" class="tw-underline tw-font-bold">
                        {{ $plan->member->name }}
                    </a>
                </div>
                <x-bid-button :plan="$plan"></x-bid-button>
            </div>
        </div>
    </section>
    <section class="tw-pt-24 tw-pb-12">
        <div class="tw-container tw-max-w-screen-sm">
            <x-section-title title="企画の説明" subtitle="DESCRIPTION"></x-section-title>
            <p class="tw-text-lg tw-mb-8">
                {{ $plan->description }}
            </p>
            <x-bid-button :plan="$plan"></x-bid-button>
        </div>
    </section>
    <section class="tw-py-12">
        <div class="tw-container tw-max-w-screen-sm">
            <x-section-title title="オークション開催期間" subtitle="SCHEDULE"></x-section-title>
            <div class="tw-overflow-x-auto tw-mb-8">
                <table class="tw-table tw-w-full">
                    <tbody>
                        <tr>
                            <td>
                                {{ __('開始日時') }}
                            </td>
                            <td>
                                {{ date('Y/m/d H:i', strtotime($plan->started_at)) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ __('終了日時') }}
                            </td>
                            <td>
                                {{ date('Y/m/d H:i', strtotime($plan->finished_at)) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <x-bid-button :plan="$plan"></x-bid-button>
        </div>
    </section>
    <section class="tw-py-12">
        <div class="tw-container tw-max-w-screen-sm">
            <x-section-title title="入札履歴" subtitle="BID HISTORY"></x-section-title>
            <div class="tw-flex tw-flex-col tw-gap-y-6 tw-mb-8">
                @forelse ($bids as $bid)
                @if(auth()->check() && $bid->user->id === auth()->user()->id)
                <div class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-border-2 tw-border-primary">
                    <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                        <div class="tw-p-6">
                            <h3 class="tw-text-lg tw-font-semibold">
                                {{ $bid->price }}円
                            </h3>
                            <p class="tw-text-sm tw-text-gray-700">{{ $bid->created_at }}</p>
                        </div>
                    </div>
                </div>
                @else
                <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                    <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                        <div class="tw-p-6">
                            <h3 class="tw-text-lg tw-font-semibold">
                                {{ $bid->price }}円
                            </h3>
                            <p class="tw-text-sm tw-text-gray-700">{{ $bid->created_at }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @empty
                <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <span class="tw-font-bold tw-text-sm">{{ __('入札履歴が見つかりませんでした。') }}</span>
                    </div>
                </div>
                @endforelse
            </div>
            <x-bid-button :plan="$plan"></x-bid-button>
        </div>
    </section>
</x-app-layout>