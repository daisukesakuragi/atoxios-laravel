<x-app-layout>
    <div class="tw-py-12 tw-container tw-max-w-screen-sm">
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
                    @if($plan->checkIfPlanIsBiddableByDateTime())
                    <button x-data="{}" x-on:click="window.livewire.emitTo('bid-confirm-modal', 'show')" class="tw-bg-indigo-700 tw-text-white tw-block tw-text-center tw-rounded tw-p-2 tw-w-full">{{ __('入札する') }}</button>
                    @else
                    <p class="tw-bg-indigo-700 tw-text-white tw-block tw-text-center tw-rounded tw-p-2 tw-w-full tw-opacity-50 tw-cursor-not-allowed">入札できません</p>
                    @endif
                    @elseif(!auth()->user()->email_verified_at)
                    <hr class="tw-my-6">
                    <div class="tw-p-4 tw-text-red-900 tw-bg-red-100 tw-border tw-border-red-200 tw-rounded">
                        <div class="tw-flex tw-justify-between tw-flex-wrap">
                            <div class="tw-w-0 tw-flex-1 tw-flex">
                                <div class="tw-w-full">
                                    <p class="tw-font-semibold tw-text-md tw-mb-4">
                                        {{ __('メールアドレスが未認証です。') }}
                                    </p>
                                    <p class="tw-text-sm tw-mb-2">
                                        {{__('ご登録いただいたお客様のメールアドレスの認証が完了していないため、こちらの企画に入札していただくことができません。')}}
                                    </p>
                                    <p class="tw-text-sm tw-mb-6">
                                        {{ __('お手数ですが、下記の「メールアドレスを認証する」ボタンをクリックしていただき、メールアドレスの認証を完了していただきますようお願いいたします。') }}
                                    </p>
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        <a :href="route('verification.send')" onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="tw-w-full tw-cursor-pointer tw-font-bold tw-inline-flex tw-justify-center tw-rounded tw-border tw-border-transparent tw-shadow-sm tw-px-4 tw-py-2 tw-bg-red-600 tw-text-base tw-text-white">
                                            {{ __('メールアドレスを認証する') }}
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @else
                    <a href="{{ route('login') }}" class="tw-bg-indigo-700 tw-text-white tw-block tw-text-center tw-rounded tw-p-2 tw-w-full">ログインして入札する</a>
                    @endauth
                </div>
            </div>
        </div>
        <h2 class="tw-text-2xl tw-font-bold tw-mb-12 tw-text-center">
            入札履歴
        </h2>
        <div class="tw-flex tw-flex-col tw-gap-y-6">
            @forelse ($bids as $bid)
            @if(auth()->check() && $bid->user->id === auth()->user()->id)
            <div class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-border-2 tw-border-indigo-700">
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
            <p class="tw-text-center">
                入札履歴がありません。
            </p>
            @endforelse
        </div>
    </div>
    @auth
    <livewire:bid-confirm-modal :user="auth()->user()" :plan="$plan" :price="$price" />
    @endauth
</x-app-layout>