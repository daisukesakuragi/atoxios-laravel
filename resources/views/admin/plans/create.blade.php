<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-admin-page-title title="企画の新規作成"></x-admin-page-title>
            <form action="{{ route('admin.plans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">
                            {{ __('出品者') }}
                        </span>
                    </label>
                    <select class="tw-select tw-select-bordered @error('member_id') tw-border-error @enderror" id="member_id" name="member_id">
                        <option disabled selected class="tw-text-sm">{{ __('選択してください') }}</option>
                        @foreach ($members as $member)
                        <option value="{{ $member->id }}" class="tw-text-sm" @if(old('member_id') == $member->id) selected @endif>
                            {{ $member->name }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('member_id'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('member_id') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('URLスラッグ') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('slug')) tw-border-error @endif" id="slug" name="slug" type="text" placeholder="sample-plan-1" value="{{ old('slug') }}" />
                    @if ($errors->has('slug'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('slug') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('タイトル') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('title')) tw-border-error @endif" id="title" name="title" type="text" placeholder="サンプル企画1" value="{{ old('title') }}" />
                    @if ($errors->has('title'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('title') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('アイキャッチ画像') }}</span>
                    </label>
                    <input type="file" class="tw-file-input tw-text-sm tw-file-input-bordered tw-w-full @if($errors->has('eyecatch_img')) tw-border-error @endif" name="eyecatch_img" />
                    @if ($errors->has('eyecatch_img'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('eyecatch_img') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('説明文') }}</span>
                    </label>
                    <textarea class="tw-textarea tw-text-sm tw-textarea-bordered tw-w-full @if($errors->has('description')) tw-border-error @endif" id="description" name="description" placeholder="これがサンプル企画1の説明文です。" rows="8">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('description') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('オークション開始日時') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('started_at')) tw-border-error @endif" type="datetime-local" step="60" id="started_at" name="started_at" value="{{ old('started_at') }}" />
                    @if ($errors->has('started_at'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('started_at') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('オークション終了日時') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('finished_at')) tw-border-error @endif" type="datetime-local" step="60" id="finished_at" name="finished_at" value="{{ old('finished_at') }}" />
                    @if ($errors->has('finished_at'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('finished_at') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('イベント開催日時') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('event_held_at')) tw-border-error @endif" type="datetime-local" step="60" id="event_held_at" name="event_held_at" value="{{ old('event_held_at') }}" />
                    @if ($errors->has('event_held_at'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('event_held_at') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('イベント開催場所') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('event_location')) tw-border-error @endif" id="event_location" name="event_location" type="text" placeholder="東京都千代田区千代田1-1" value="{{ old('event_location') }}" />
                    @if ($errors->has('event_location'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('event_location') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('イベント集合場所') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('event_meeting_location')) tw-border-error @endif" id="event_meeting_location" name="event_meeting_location" type="text" placeholder="東京都千代田区丸の内1丁目" value="{{ old('event_meeting_location') }}" />
                    @if ($errors->has('event_meeting_location'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('event_meeting_location') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-8">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('イベント集合時間') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('event_meeting_time')) tw-border-error @endif" type="time" step="60" id="event_meeting_time" name="event_meeting_time" placeholder="19:00" value="{{ old('event_meeting_time') }}" />
                    @if ($errors->has('event_meeting_time'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('event_meeting_time') }}</span>
                    </label>
                    @endif
                </div>
                <button class="tw-btn tw-btn-primary tw-btn-block" type="submit">
                    {{ __('作成する') }}
                </button>
            </form>
        </div>
    </section>
</x-admin-layout>