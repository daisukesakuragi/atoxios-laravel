<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('ダッシュボード') }}
        </h1>
    </x-slot>
    <section class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">{{ __('入札履歴') }}</h2>
            @if(count($bids) === 0)
            <p class="tw-text-center">
                {{ __('入札履歴のデータがありません。') }}
            </p>
            @else
            <table class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-w-full tw-mb-16 tw-table-auto">
                <thead class="tw-border tw-border-b-2">
                    <tr>
                        <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('ID') }}</th>
                        <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('入札者名') }}</th>
                        <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('入札金額') }}</th>
                        <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('入札日時') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bids as $bid)
                    <tr>
                        <td class="tw-px-4 tw-py-2 tw-text-left">{{ $bid->id }}</td>
                        <td class="tw-px-4 tw-py-2 tw-text-left">{{ $bid->user->name }}</td>
                        <td class="tw-px-4 tw-py-2 tw-text-left">{{ number_format($bid->price) . '円' }}</td>
                        <td class="tw-px-4 tw-py-2 tw-text-left">{{ $bid->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.bids.index') }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full tw-max-w-lg tw-mx-auto">
                {{ __('全ての入札履歴をみる') }}
            </a>
            @endif
        </div>
    </section>
    <section class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">{{ __('入札者') }}</h2>
            @if(count($users) === 0)
            <p class="tw-text-center">
                {{ __('入札者のデータがありません。') }}
            </p>
            @else
            <table class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-w-full tw-mb-16 tw-table-auto">
                <thead class="tw-border tw-border-b-2">
                    <tr>
                        <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('ID') }}</th>
                        <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('名前') }}</th>
                        <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('メールアドレス') }}</th>
                        <th class="tw-px-4 tw-py-2 tw-text-left">{{ __('メールアドレス確認状況') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="tw-px-4 tw-py-2 tw-text-left">{{ $user->id }}</td>
                        <td class="tw-px-4 tw-py-2 tw-text-left">{{ $user->name }}</td>
                        <td class="tw-px-4 tw-py-2 tw-text-left">{{ $user->email }}</td>
                        <td class="tw-px-4 tw-py-2 tw-text-left">{{ $user->hasVerifiedEmail() ? '確認済み' : '未確認' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.users.index') }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full tw-max-w-lg tw-mx-auto">
                {{ __('全ての入札者をみる') }}
            </a>
            @endif
        </div>
    </section>
    <section class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">{{ __('出品者') }}</h2>
            @if (count($members) === 0)
            <p class="tw-text-center">
                {{ __('出品者のデータがありません。') }}
            </p>
            @else
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-16">
                @foreach ($members as $member)
                <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                    <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" class="tw-w-full tw-h-52 lg:tw-h-64 tw-object-cover tw-rounded-t-lg">
                    <div class="tw-p-6">
                        <h3 class="tw-text-lg tw-font-semibold">
                            {{ $member->name }}
                        </h3>
                        <p class="tw-mb-4">
                            {{ mb_substr($member->introduction, 0, 65) . '...' }}
                        </p>
                        <a href="{{ route('admin.members.show', $member->id) }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full">詳細をみる</a>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('admin.members.index') }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full tw-max-w-lg tw-mx-auto">
                {{ __('全ての出品者をみる') }}
            </a>
            @endif
        </div>
    </section>
    <section class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">{{ __('企画') }}</h2>
            @if (count($plans) === 0)
            <p class="tw-text-center">
                {{ __('企画のデータがありません。') }}
            </p>
            @else
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-16">
                @foreach ($plans as $plan)
                <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                    <img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}" class="tw-w-full tw-h-52 lg:tw-h-64 tw-object-cover tw-rounded-t-lg">
                    <div class="tw-p-6">
                        <h3 class="tw-text-lg tw-font-semibold">
                            {{ $plan->title }}
                        </h3>
                        <p class="tw-mb-4">{{ mb_substr($plan->description, 0, 65) . '...' }}</p>
                        <a href="{{ route('admin.plans.show', $plan->id) }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full">詳細をみる</a>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('admin.plans.index') }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full tw-max-w-lg tw-mx-auto">
                {{ __('全ての企画をみる') }}
            </a>
            @endif
        </div>
    </section>
    <section class="tw-py-24">
        <div class="tw-container tw-max-w-screen-xl">
            <h2 class="tw-text-4xl tw-font-bold tw-text-center tw-mb-16">{{ __('記事') }}</h2>
            @if (count($articles) === 0)
            <p class="tw-text-center">
                {{ __('記事のデータがありません。') }}
            </p>
            @else
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-6 tw-mb-16">
                @foreach ($articles as $article)
                <div class="tw-bg-white tw-rounded-lg tw-shadow-lg">
                    <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="tw-w-full tw-h-52 lg:tw-h-64 tw-object-cover tw-rounded-t-lg">
                    <div class="tw-p-6">
                        <h3 class="tw-text-lg tw-font-semibold">
                            {{ $article->title }}
                        </h3>
                        <p class="tw-mb-4">{{ mb_substr($article->description, 0, 65) . '...' }}</p>
                        <a href="{{ route('admin.articles.show', $article->id) }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full">詳細をみる</a>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('admin.articles.index') }}" class="tw-bg-indigo-700 tw-block tw-text-center tw-text-white tw-rounded tw-p-2 tw-w-full tw-max-w-lg tw-mx-auto">
                {{ __('全ての記事をみる') }}
            </a>
            @endif
        </div>
    </section>
</x-admin-layout>