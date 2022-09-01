<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('記事作成') }}
        </h1>
    </x-slot>
    <div class="tw-py-12 tw-container">
        <div class=" tw-bg-white tw-rounded-lg tw-shadow-lg tw-py-6 tw-px-4 lg:tw-px-6 tw-max-w-2xl tw-mx-auto">
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
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
                    @error('member_id')
                    <span class="tw-text-red-500 tw-text-sm" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="slug">
                        {{ __('*URLスラッグ') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="slug" name="slug" type="text" placeholder="sample-plan-1">
                    @if ($errors->has('slug'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('slug') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="title">
                        {{ __('*タイトル') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="title" name="title" type="text" placeholder="サンプルプラン1">
                    @if ($errors->has('title'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="eyecatch_img">
                        {{ __('*アイキャッチ画像') }}</label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-border-gray-700 tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" type="file" name="eyecatch_img" id="eyecatch_img">
                    @if ($errors->has('eyecatch_img'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('eyecatch_img') }}</p>
                    @endif
                </div>

                <div class="tw-mb-4">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="description">
                        {{ __('*説明文') }}
                    </label>
                    <textarea rows="4" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="description" name="description" placeholder="これはサンプルプラン1の説明文です。"></textarea>
                    @if ($errors->has('description'))
                    <p class="tw-text-red-500">*{{ $errors->first('description') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="started_at">
                        {{ __('*オークション開始日時') }}
                    </label>
                    <input type="datetime-local" id="started_at" name="started_at" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline">
                    @if ($errors->has('started_at'))
                    <p class="tw-text-red-500">*{{ $errors->first('started_at') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="finished_at">
                        {{ __('*オークション終了日時') }}
                    </label>
                    <input type="datetime-local" id="finished_at" name="finished_at" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline">
                    @if ($errors->has('finished_at'))
                    <p class="tw-text-red-500">*{{ $errors->first('finished_at') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="fundraising_ratio">
                        {{ __('*募金率（%）') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="fundraising_ratio" name="fundraising_ratio" type="number" placeholder="20">
                    @if ($errors->has('fundraising_ratio'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('fundraising_ratio') }}</p>
                    @endif
                </div>

                <button class="tw-bg-indigo-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-w-full" type="submit">
                    {{ __('作成する') }}
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>