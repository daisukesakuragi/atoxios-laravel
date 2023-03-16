<x-app-layout>
    @auth
    <livewire:bid-confirm-modal :user="auth()->user()" :plan="$plan" :price="$price" />
    @endauth
    <section class="tw-hero" style="background-image: url('{{ $plan->eyecatch_img_url }}');">
        <div class="tw-hero-overlay tw-bg-opacity-60 tw-pt-32 tw-pb-24"></div>
        <div class="tw-hero-content tw-text-center tw-text-neutral-content tw-pt-32 tw-pb-24">
            <div class="tw-max-w-screen-sm tw-mx-auto">
                <h1 class="tw-mb-2 tw-text-5xl lg:tw-text-7xl tw-font-bold tw-italic">{{ $plan->title }}</h1>
                <p class="tw-text-right">{{ __('by') }}<a href="{{ route('members.show', $plan->member->slug)}}" class="tw-underline tw-font-bold">{{ $plan->member->name }}</a></p>
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
            @if(count($bids) > 0)
            <div class="tw-overflow-x-auto tw-w-full">
                <table class="tw-table tw-w-full tw-mb-12">
                    <thead>
                        <tr>
                            <th>{{ __('入札金額') }}</th>
                            <th>{{ __('入札日時') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bids as $bid)
                        @if(auth()->check() && $bid->user->id === auth()->user()->id)
                        <tr>
                            <td>
                                <strong class="tw-mr-2">{{ number_format($bid->price) . '円' }}</strong><span class="tw-badge">{{ __('あなたの入札') }}</span>
                            </td>
                            <td>
                                {{ date('Y/m/d H:i:s', strtotime($bid->created_at)) }}
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td>
                                {{ number_format($bid->price) . '円' }}
                            </td>
                            <td>
                                {{ date('Y/m/d H:i:s', strtotime($bid->created_at)) }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>                  
                </table>
            </div>
            @else
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('入札履歴のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @endif
            <x-bid-button :plan="$plan"></x-bid-button>
        </div>
    </section>
</x-app-layout>