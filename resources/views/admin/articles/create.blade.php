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
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="slug">
                        URLスラッグ
                    </label>
                    <input
                        class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline"
                        id="slug" name="slug" type="text" placeholder="sample-article-1">
                    @if ($errors->has('slug'))
                        <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('slug') }}</p>
                    @endif
                </div>
                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="title">
                        タイトル
                    </label>
                    <input
                        class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline"
                        id="title" name="title" type="text" placeholder="Sample Article 1">
                    @if ($errors->has('title'))
                        <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="tw-mb-4">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="description">
                        説明文
                    </label>
                    <textarea rows="4"
                        class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline"
                        id="description" name="description" placeholder="This is a meta description of Sample Article 1."></textarea>
                    @if ($errors->has('description'))
                        <p class="tw-text-red-500">*{{ $errors->first('description') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="thumbnail">
                        サムネイル画像</label>
                    <input
                        class="tw-shadow tw-appearance-none tw-border tw-border-gray-700 tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline"
                        type="file" name="thumbnail" id="thumbnail">
                    @if ($errors->has('thumbnail'))
                        <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('thumbnail') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="body">
                        本文
                    </label>
                    <textarea rows="20"
                        class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline"
                        id="body" name="body" placeholder="This is a body text of Sample Article 1."></textarea>
                    @if ($errors->has('body'))
                        <p class="tw-text-red-500">*{{ $errors->first('body') }}</p>
                    @endif
                </div>
                <button class="tw-bg-indigo-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-w-full"
                    type="submit">
                    作成する
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
