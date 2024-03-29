<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-xl">
            <x-admin-page-title title="ダッシュボード"></x-admin-page-title>
            <!-- 入札履歴 -->
            <x-admin-section-title title="入札履歴"></x-admin-section-title>
            @if(count($bids) === 0)
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto tw-mb-16">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('入札履歴のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @else
            <div class="tw-overflow-x-auto tw-w-full tw-mb-8">
                <table class="tw-table tw-w-full">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('入札者名') }}</th>
                            <th>{{ __('入札企画名') }}</th>
                            <th>{{ __('入札金額') }}</th>
                            <th>{{ __('入札日時') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bids as $bid)
                        @if($bid->plan->trashed())
                        <tr class="tw-opacity-50">
                            <td>{{ $bid->id }}</td>
                            <td>{{ $bid->user->name }}</td>
                            <td>{{ $bid->plan->title }}<br><small class="tw-text-error">{{ __('*こちらの企画は論理削除されています。') }}</small></td>
                            <td>{{ number_format($bid->price) . '円' }}</td>
                            <td>{{ $bid->created_at }}</td>
                        </tr>
                        @elseif($bid->user->trashed())
                        <tr class="tw-opacity-50">
                            <td>{{ $bid->id }}</td>
                            <td>{{ $bid->user->name }}<br><small class="tw-text-error">{{ __('*こちらのユーザーは退会しています。') }}</small></td>
                            <td>{{ $bid->plan->title }}</td>
                            <td>{{ number_format($bid->price) . '円' }}</td>
                            <td>{{ $bid->created_at }}</td>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $bid->id }}</td>
                            <td>{{ $bid->user->name }}</td>
                            <td>{{ $bid->plan->title }}</td>
                            <td>{{ number_format($bid->price) . '円' }}</td>
                            <td>{{ $bid->created_at }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tw-text-center tw-mb-16">
                <a href="{{ route('admin.bids.index') }}" class="tw-btn tw-btn-primary tw-btn-wide">
                    {{ __('全ての入札履歴をみる') }}
                </a>
            </div>
            @endif
            <!-- ユーザー -->
            <x-admin-section-title title="ユーザー"></x-admin-section-title>
            @if(count($users) === 0)
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto tw-mb-16">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('ユーザーのデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @else
            <div class="tw-overflow-x-auto tw-w-full tw-mb-8">
                <table class="tw-table tw-w-full">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('名前') }}</th>
                            <th>{{ __('メールアドレス') }}</th>
                            <th>{{ __('メールアドレス認証') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        @if($user->trashed())
                        <tr class="tw-opacity-50">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}<br><small class="tw-text-error">{{ __('*こちらのユーザーは退会しています。') }}</small></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->hasVerifiedEmail() ? '認証済み' : '未認証' }}</td>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->hasVerifiedEmail() ? '認証済み' : '未認証' }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tw-text-center tw-mb-16">
                <a href="{{ route('admin.users.index') }}" class="tw-btn tw-btn-primary tw-btn-wide">
                    {{ __('全てのユーザーをみる') }}
                </a>
            </div>
            @endif
            <!-- 出品者 -->
            <x-admin-section-title title="出品者"></x-admin-section-title>
            @if (count($members) === 0)
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto tw-mb-16">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('出品者のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @else
            <div class="tw-overflow-x-auto tw-w-full tw-mb-8">
                <table class="tw-table tw-w-full">
                    <thead>
                        <tr>
                            <th>名前</th>
                            <th>経歴</th>
                            <th>自己PR</th>
                            <th>詳細ページ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                        @if($member->trashed())
                        <tr class="tw-opacity-50">
                            <td>
                                <div class="tw-flex tw-items-center tw-space-x-3">
                                <div class="tw-avatar">
                                    <div class="tw-mask tw-mask-squircle tw-w-12 tw-h-12">
                                        <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" />
                                    </div>
                                </div>
                                <div>
                                    {{ $member->name }}<br><small class="tw-text-error">{{ __('*こちらの出品者は論理削除されています。') }}</small>
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="tw-text-sm">
                                    {{ mb_strlen($member->career) > 30 ? mb_substr($member->career, 0, 30) . '...' : $member->career }}
                                </div>
                            </td>
                            <td>
                                <div class="tw-text-sm">
                                    {{ mb_strlen($member->introduction) > 30 ? mb_substr($member->introduction, 0, 30) . '...' : $member->introduction }}
                                </div>
                            </td>
                            <th>
                                <a href="{{ route('admin.members.show', $member->id) }}" class="tw-btn tw-btn-primary tw-btn-disabled tw-btn-sm">
                                    {{ __('詳細ページ') }}
                                </a>
                            </th>
                        </tr>
                        @else
                        <tr>
                            <td>
                                <div class="tw-flex tw-items-center tw-space-x-3">
                                <div class="tw-avatar">
                                    <div class="tw-mask tw-mask-squircle tw-w-12 tw-h-12">
                                        <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" />
                                    </div>
                                </div>
                                <div>
                                    {{ $member->name }}
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="tw-text-sm">
                                    {{ mb_strlen($member->career) > 30 ? mb_substr($member->career, 0, 30) . '...' : $member->career }}
                                </div>
                            </td>
                            <td>
                                <div class="tw-text-sm">
                                    {{ mb_strlen($member->introduction) > 30 ? mb_substr($member->introduction, 0, 30) . '...' : $member->introduction }}
                                </div>
                            </td>
                            <th>
                                <a href="{{ route('admin.members.show', $member->id) }}" class="tw-btn tw-btn-primary tw-btn-sm">
                                    {{ __('詳細ページ') }}
                                </a>
                            </th>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tw-text-center tw-mb-16">
                <a href="{{ route('admin.members.index') }}" class="tw-btn tw-btn-primary tw-btn-wide">
                    {{ __('全ての出品者をみる') }}
                </a>
            </div>
            @endif
            <!-- 企画 -->
            <x-admin-section-title title="企画"></x-admin-section-title>
            @if (count($plans) === 0)
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto tw-mb-16">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('企画のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @else
            <div class="tw-overflow-x-auto tw-w-full tw-mb-8">
                <table class="tw-table tw-w-full">
                    <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>説明文</th>
                            <th>オークション開催日時</th>
                            <th>オークション終了日時</th>
                            <th>詳細ページ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                        @if($plan->trashed())
                        <tr class="tw-opacity-50">
                            <td>
                                <div class="tw-flex tw-items-center tw-space-x-3">
                                <div class="tw-avatar">
                                    <div class="tw-mask tw-mask-squircle tw-w-12 tw-h-12">
                                        <img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}" />
                                    </div>
                                </div>
                                <div>
                                    {{ mb_strlen($plan->title) > 15 ? mb_substr($plan->title, 0, 15) . '...' : $plan->title }}<br><small class="tw-text-error">{{ __('*こちらの企画は論理削除されています。') }}</small>
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="tw-text-sm">
                                    {{ mb_strlen($plan->description) > 30 ? mb_substr($plan->description, 0, 30) . '...' : $plan->description }}
                                </div>
                            </td>
                            <td>
                                <div class="tw-text-sm">
                                    {{ $plan->started_at }}
                                </div>
                            </td>
                            <td>
                                <div class="tw-text-sm">
                                    {{ $plan->finished_at }}
                                </div>
                            </td>
                            <th>
                                <a href="{{ route('admin.plans.show', $plan->id) }}" class="tw-btn tw-btn-primary tw-btn-disabled tw-btn-sm">
                                    {{ __('詳細ページ') }}
                                </a>
                            </th>
                        </tr>
                        @else
                        <tr>
                            <td>
                                <div class="tw-flex tw-items-center tw-space-x-3">
                                    <div class="tw-avatar">
                                        <div class="tw-mask tw-mask-squircle tw-w-12 tw-h-12">
                                            <img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}" />
                                        </div>
                                    </div>
                                    <div>
                                        {{ mb_strlen($plan->title) > 15 ? mb_substr($plan->title, 0, 15) . '...' : $plan->title }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="tw-text-sm">
                                    {{ mb_strlen($plan->description) > 30 ? mb_substr($plan->description, 0, 30) . '...' : $plan->description }}
                                </div>
                            </td>
                            <td>
                                <div class="tw-text-sm">
                                    {{ $plan->started_at }}
                                </div>
                            </td>
                            <td>
                                <div class="tw-text-sm">
                                    {{ $plan->finished_at }}
                                </div>
                            </td>
                            <th>
                                <a href="{{ route('admin.plans.show', $plan->id) }}" class="tw-btn tw-btn-primary tw-btn-sm">
                                    {{ __('詳細ページ') }}
                                </a>
                            </th>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tw-text-center tw-mb-16">
                <a href="{{ route('admin.plans.index') }}" class="tw-btn tw-btn-primary tw-btn-wide">
                    {{ __('全ての企画をみる') }}
                </a>
            </div>
            @endif
            <!-- 記事 -->
            <x-admin-section-title title="記事"></x-admin-section-title>
            @if (count($articles) === 0)
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto tw-mb-16">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('記事のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @else
            <div class="tw-overflow-x-auto tw-w-full tw-mb-8">
                <table class="tw-table tw-w-full">
                    <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>説明文</th>
                            <th>詳細ページ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                        <td>
                            <div class="tw-flex tw-items-center tw-space-x-3">
                            <div class="tw-avatar">
                                <div class="tw-mask tw-mask-squircle tw-w-12 tw-h-12">
                                    <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" />
                                </div>
                            </div>
                            <div>
                                <div class="tw-font-bold">
                                    {{ mb_strlen($article->title) > 15 ? mb_substr($article->title, 0, 15) . '...' : $article->title }}
                                </div>
                            </div>
                            </div>
                        </td>
                        <td>
                            <div class="tw-text-sm">
                                {{ mb_strlen($article->description) > 30 ? mb_substr($article->description, 0, 30) . '...' : $article->description }}
                            </div>
                        </td>
                        <th>
                            <a href="{{ route('admin.articles.show', $article->id) }}" class="tw-btn tw-btn-primary tw-btn-sm">
                                {{ __('詳細ページ') }}
                            </a>
                        </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tw-text-center tw-mb-16">
                <a href="{{ route('admin.articles.index') }}" class="tw-btn tw-btn-primary tw-btn-wide">
                    {{ __('全ての記事をみる') }}
                </a>
            </div>
            @endif
        </div>
    </section>
</x-admin-layout>