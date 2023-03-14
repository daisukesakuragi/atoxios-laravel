<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-xl">
            <x-admin-page-title title="全ての企画"></x-admin-page-title>
            @if(count($plans) === 0)
            <div class="tw-alert tw-shadow-lg tw-max-w-2xl tw-mx-auto">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="tw-stroke-info tw-flex-shrink-0 tw-w-6 tw-h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="tw-font-bold tw-text-sm">{{ __('企画のデータが見つかりませんでした。') }}</span>
                </div>
            </div>
            @else
            <div class="tw-overflow-x-auto tw-w-full">
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
                        <tr>
                        <td>
                            <div class="tw-flex tw-items-center tw-space-x-3">
                            <div class="tw-avatar">
                                <div class="tw-mask tw-mask-squircle tw-w-12 tw-h-12">
                                    <img src="{{ $plan->eyecatch_img_url }}" alt="{{ $plan->title }}" />
                                </div>
                            </div>
                            <div>
                                <div class="tw-font-bold">{{ $plan->title }}</div>
                                <div class="tw-text-sm tw-opacity-50">{{ __('by') }}<a href="{{ route('admin.members.show', $plan->member->id) }}" class="tw-ml-1 tw-underline">{{ $plan->member->name }}</a></div>
                            </div>
                            </div>
                        </td>
                        <td>
                            <div class="tw-text-sm">
                                {{ $plan->description }}
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
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $plans->links() }}
            @endif
        </div>
    </section>
</x-admin-layout>