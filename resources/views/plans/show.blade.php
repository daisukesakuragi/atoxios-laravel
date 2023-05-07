<x-app-layout>
    @auth
    <livewire:bid-confirm-modal :user="auth()->user()" :plan="$plan" :price="$price" />
    @endauth
    <section class="tw-hero" style="background-image: url('{{ $plan->eyecatch_img_url }}');">
        <div class="tw-hero-overlay tw-bg-opacity-60 tw-pt-32 tw-pb-24"></div>
        <div class="tw-hero-content tw-text-center tw-text-neutral-content tw-pt-32 tw-pb-24">
            <div class="tw-max-w-screen-sm tw-text-left">
                <x-plan-status-badge :plan="$plan"></x-plan-status-badge>
                <h1 class="tw-mb-8 tw-mt-4 tw-text-4xl lg:tw-text-5xl tw-font-bold">{{ $plan->title }}</h1>
                <div class="tw-stats tw-shadow tw-w-full tw-text-center tw-mb-8">
                    <div class="tw-stat">
                      <div class="tw-stat-title tw-pt-4">{{ __('入札価格') }}</div>
                      <!-- <div class="tw-stat-value">{{ number_format($price) . '円' }}</div> -->
                      <div class="tw-stat-value">{{ __('+5,000円') }}</div>
                      <div class="tw-stat-desc tw-mb-6 tw-text-error">{{ __('*最低入札価格以下では入札できません。') }}</div>
                      <x-bid-button :plan="$plan" :price="$price"></x-bid-button>
                    </div>    
                </div>
            </div>
        </div>
    </section>
    <section class="tw-pt-24 tw-pb-12">
        <div class="tw-container tw-max-w-screen-sm">
            <x-section-title title="この企画について" subtitle="ABOUT THIS PLAN"></x-section-title>
            <p class="tw-text-lg tw-mb-8">
                {{ $plan->description }}
            </p>
            <x-bid-button :plan="$plan" :price="$price"></x-bid-button>
        </div>
    </section>
    <section class="tw-py-12">
        <div class="tw-container tw-max-w-screen-sm">
            <x-section-title title="企画の出品者" subtitle="WHO'S PLAN"></x-section-title>
            <div class="tw-text-center">
                <div class="tw-avatar tw-mb-8">
                    <div class="tw-w-44 tw-h-44 tw-rounded-full tw-ring tw-ring-primary tw-ring-offset-base-100 tw-ring-offset-2">
                        <img src="{{ $plan->member->profile_img_url }}" alt="{{ $plan->member->name }}" />
                    </div>
                </div>
                <h3 class="tw-text-lg lg:tw-text-xl tw-font-bold tw-mb-8">{{ $plan->member->name }}</h3>
                <a href="{{ route('members.show', $plan->member->slug)}}" rel="noopener" target="_blank" class="tw-btn tw-btn-block">{{ __('出品者の詳細はこちら') }}</a>
            </div>
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
            <x-bid-button :plan="$plan" :price="$price"></x-bid-button>
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
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto tw-mb-12">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('入札履歴のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @endif
            <x-bid-button :plan="$plan" :price="$price"></x-bid-button>
        </div>
    </section>
</x-app-layout>