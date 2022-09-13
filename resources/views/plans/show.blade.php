<x-app-layout>
    <div class="tw-py-12 tw-container tw-max-w-screen-md">
        <div class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-mb-20">
            <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                <img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}" class="tw-w-full tw-h-52 lg:tw-h-96 tw-object-cover tw-rounded-t-lg">
                <div class="tw-p-6">
                    <h1 class="tw-text-lg tw-font-semibold">
                        {{ $plan->title }}
                    </h1>
                    <p class="tw-text-sm tw-text-gray-700 tw-mb-4">by <a href="{{ route('members.show', $plan->member->slug) }}" class="tw-underline">{{ $plan->member->name }}</a></p>
                    <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
                        {{ $plan->description }}
                    </p>
                    <p class="tw-text-sm tw-text-gray-600 tw-mb-3">
                        開催期間: {{ $plan->started_at }} ~ {{ $plan->finished_at }}
                    </p>
                    @auth
                    @if(auth()->user()->email_verified_at)
                    <form method="POST" action="{{ route('bid') }}">
                        @csrf
                        <input type="hidden" name="price" id="price" value="{{ $price }}" />
                        <input type="hidden" name="plan_id" id="plan_id" value="{{ $plan->id }}" />
                        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}" />
                        <a :href="route('bid')" onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="tw-bg-indigo-700 tw-text-white tw-block tw-text-center tw-rounded tw-p-2 tw-w-full">
                            {{ __('入札する') }}
                        </a>
                    </form>
                    @elseif(!auth()->user()->email_verified_at)
                    <hr class="tw-my-6">
                    <div class="tw-p-4 tw-text-red-900 tw-bg-red-100 tw-border tw-border-red-200 tw-rounded">
                        <div class="tw-flex tw-justify-between tw-flex-wrap">
                            <div class="tw-w-0 tw-flex-1 tw-flex">
                                <div class="tw-w-full">
                                    <p class="tw-leading-6 tw-font-bold tw-flex tw-items-center tw-mb-3 tw-gap-x-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg><span class="tw-font-semibold tw-text-md">{{ __('メールアドレスが未確認です') }}</span>
                                    </p>
                                    <p class="tw-text-sm tw-mb-2">
                                        {{__('ご登録いただいたメールアドレスの確認が完了していないため、')}}<b>{{ __('入札していただくことができません。')}}</b>
                                    </p>
                                    <p class="tw-text-sm tw-mb-4">
                                        {{ __('お手数ですが、下記の「確認用メールを送信する」ボタンをクリックしていただき、メールアドレスの確認作業を完了していただきますようお願いいたします。') }}
                                    </p>
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        <a :href="route('verification.send')" onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="tw-w-full tw-inline-flex tw-justify-center tw-rounded tw-border tw-border-transparent tw-shadow-sm tw-px-4 tw-py-2 tw-bg-red-600 tw-text-base tw-font-medium tw-text-white">
                                            {{ __('確認用メールを送信する') }}
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
        <h2 class="tw-text-2xl tw-font-bold tw-mb-12 tw-text-center">
            入札履歴
        </h2>
        <div class="tw-flex tw-flex-col tw-gap-y-6">
            @forelse ($bids as $bid)
            <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                    <div class="tw-p-6">
                        <h3 class="tw-text-lg tw-font-semibold">
                            {{ $bid->price . '円' }}
                        </h3>
                        <p class="tw-text-sm tw-text-gray-700">{{ $bid->created_at }}</p>
                    </div>
                </div>
            </div>
            @empty
            <p class="tw-text-center">
                入札履歴がありません。
            </p>
            @endforelse
        </div>
    </div>
</x-app-layout>