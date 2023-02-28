<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('企画作成') }}
        </h1>
    </x-slot>
    <div class="tw-py-12 tw-container">
        <div class=" tw-bg-white tw-rounded-lg tw-shadow-lg tw-py-6 tw-px-4 lg:tw-px-6 tw-max-w-2xl tw-mx-auto">
            <form action="{{ route('admin.plans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="tw-mb-6">
                    <label for="creator_id" class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2">{{ __('*出品者') }}</label>
                    <select class="tw-shadow tw-text-sm tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('member_id') tw-mb-2 tw-border-red-500 @enderror" id="member_id" name="member_id">
                        <option value="">{{ __('選択してください') }}</option>
                        @foreach ($members as $member)
                        <option value="{{ $member->id }}" @if (old('member_id')==$member->id) selected @endif>
                            {{ $member->name }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('member_id'))
                    <p class="tw-text-red-500 tw-text-sm" role="alert">*{{ $errors->first('member_id') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="slug">
                        {{ __('*URLスラッグ') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('slug') tw-mb-2 tw-border-red-500 @enderror" id="slug" name="slug" type="text" placeholder="sample-plan-1" value="{{ old('slug') }}">
                    @if ($errors->has('slug'))
                    <p class="tw-text-red-500 tw-text-sm">*{{ $errors->first('slug') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="title">
                        {{ __('*タイトル') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('title') tw-mb-2 tw-border-red-500 @enderror" id="title" name="title" type="text" placeholder="サンプルプラン1" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                    <p class="tw-text-red-500 tw-text-sm">*{{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="eyecatch_img">
                        {{ __('*アイキャッチ画像') }}</label>
                    <input type="file" class="tw-shadow tw-appearance-none tw-border tw-border-gray-700 tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('eyecatch_img') tw-mb-2 tw-border-red-500 @enderror" name="eyecatch_img" id="eyecatch_img">
                    @if ($errors->has('eyecatch_img'))
                    <p class="tw-text-red-500 tw-text-sm">*{{ $errors->first('eyecatch_img') }}</p>
                    @endif
                </div>

                <div class="tw-mb-4">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="description">
                        {{ __('*説明文') }}
                    </label>
                    <textarea rows="4" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('description') tw-mb-1 tw-border-red-500 @enderror" id="description" name="description" placeholder="これはサンプルプラン1の説明文です。">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                    <p class="tw-text-red-500 tw-text-sm">*{{ $errors->first('description') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="started_at">
                        {{ __('*オークション開始日時') }}
                    </label>
                    <input type="datetime-local" id="started_at" name="started_at" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('started_at') tw-mb-2 tw-border-red-500 @enderror" value="{{ old('started_at') }}">
                    @if ($errors->has('started_at'))
                    <p class="tw-text-red-500 tw-text-sm">*{{ $errors->first('started_at') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="finished_at">
                        {{ __('*オークション終了日時') }}
                    </label>
                    <input type="datetime-local" id="finished_at" name="finished_at" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('finished_at') tw-mb-2 tw-border-red-500 @enderror" value="{{ old('finished_at') }}">
                    @if ($errors->has('finished_at'))
                    <p class="tw-text-red-500 tw-text-sm">*{{ $errors->first('finished_at') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="event_held_at">
                        {{ __('*イベント開催日時') }}
                    </label>
                    <input type="datetime-local" id="event_held_at" name="event_held_at" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('event_held_at') tw-mb-2 tw-border-red-500 @enderror" value="{{ old('event_held_at') }}">
                    @if ($errors->has('event_held_at'))
                    <p class="tw-text-red-500 tw-text-sm">*{{ $errors->first('event_held_at') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="event_location">
                        {{ __('*イベント開催場所') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('event_location') tw-mb-2 tw-border-red-500 @enderror" id="event_location" name="event_location" type="text" placeholder="東京都千代田区千代田1-1" value="{{ old('event_location') }}">
                    @if ($errors->has('event_location'))
                    <p class="tw-text-red-500 tw-text-sm">*{{ $errors->first('event_location') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="event_meeting_location">
                        {{ __('*イベント集合場所') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('event_meeting_location') tw-mb-2 tw-border-red-500 @enderror" id="event_meeting_location" name="event_meeting_location" type="text" placeholder="東京都千代田区丸の内1丁目" value="{{ old('event_meeting_location') }}">
                    @if ($errors->has('event_meeting_location'))
                    <p class="tw-text-red-500 tw-text-sm">*{{ $errors->first('event_meeting_location') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="event_meeting_time">
                        {{ __('*イベント集合時間') }}
                    </label>
                    <input type="time" id="event_meeting_time" name="event_meeting_time" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline @error('event_meeting_time') tw-mb-2 tw-border-red-500 @enderror" placeholder="19:00" value="{{ old('event_meeting_time') }}">
                    @if ($errors->has('event_meeting_time'))
                    <p class="tw-text-red-500 tw-text-sm">*{{ $errors->first('event_meeting_time') }}</p>
                    @endif
                </div>

                <button class="tw-bg-indigo-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-w-full" type="submit">
                    {{ __('作成する') }}
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>