<x-admin-layout>
    <x-slot name="header">
        <h1 class="tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('出品者作成') }}
        </h1>
    </x-slot>
    <div class="tw-py-12 tw-container">
        <div class=" tw-bg-white tw-rounded-lg tw-shadow-lg tw-py-6 tw-px-4 lg:tw-px-6 tw-max-w-2xl tw-mx-auto">
            <form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="slug">
                        {{ __('*URLスラッグ') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="slug" name="slug" type="text" placeholder="sample-member-1" value="{{ old('slug') }}">
                    @if ($errors->has('slug'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('slug') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="name">
                        {{ __('*名前') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="name" name="name" type="text" placeholder="サンプル出品者1" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="tw-mb-4">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="career">
                        {{ __('*経歴') }}
                    </label>
                    <textarea rows="8" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="career" name="career" placeholder="これが私の経歴です。">{{ old('career') }}</textarea>
                    @if ($errors->has('career'))
                    <p class="tw-text-red-500">*{{ $errors->first('career') }}</p>
                    @endif
                </div>

                <div class="tw-mb-4">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="introduction">
                        {{ __('*自己PR') }}
                    </label>
                    <textarea rows="8" class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="introduction" name="introduction" placeholder="これが私の自己PRです。">{{ old('introduction') }}</textarea>
                    @if ($errors->has('introduction'))
                    <p class="tw-text-red-500">*{{ $errors->first('introduction') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="profile_img">
                        {{ __('*プロフィール画像') }}</label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-border-gray-700 tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" type="file" name="profile_img" id="profile_img">
                    @if ($errors->has('profile_img'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('profile_img') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="instagram_url">
                        {{ __('Instagram') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="instagram_url" name="instagram_url" type="text" placeholder="https://instagram.com/sample-member-1" value="{{ old('instagram_url') }}">
                    @if ($errors->has('instagram_url'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('instagram_url') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="tiktok_url">
                        {{ __('TikTok') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="tiktok_url" name="tiktok_url" type="text" placeholder="https://tiktok.com/sample-member-1" value="{{ old('tiktok_url') }}">
                    @if ($errors->has('tiktok_url'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('tiktok_url') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="twitter_url">
                        {{ __('Twitter') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="twitter_url" name="twitter_url" type="text" placeholder="https://twitter.com/sample-member-1" value="{{ old('twitter_url') }}">
                    @if ($errors->has('twitter_url'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('twitter_url') }}</p>
                    @endif
                </div>

                <div class="tw-mb-6">
                    <label class="tw-block tw-text-gray-700 tw-text-sm tw-font-bold tw-mb-2" for="youtube_url">
                        {{ __('YouTube') }}
                    </label>
                    <input class="tw-shadow tw-appearance-none tw-border tw-rounded tw-w-full tw-py-2 tw-px-3 tw-text-gray-700 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline" id="youtube_url" name="youtube_url" type="text" placeholder="https://youtube.com/sample-member-1" value="{{ old('youtube_url') }}">
                    @if ($errors->has('youtube_url'))
                    <p class="tw-text-red-500 tw-mt-1">*{{ $errors->first('youtube_url') }}</p>
                    @endif
                </div>

                <button class="tw-bg-indigo-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-w-full" type="submit">
                    {{ __('作成する') }}
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>