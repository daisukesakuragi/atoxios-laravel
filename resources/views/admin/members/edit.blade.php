<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-admin-page-title title="出品者の編集"></x-admin-page-title>            
            <form action="{{ route('admin.members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('URLスラッグ') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('slug')) tw-border-error @endif" id="slug" name="slug" type="text" placeholder="sample-member-1" value="{{ old('slug', $member->slug) }}" />
                    @if ($errors->has('slug'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('slug') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('名前') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('name')) tw-border-error @endif" id="name" name="name" type="text" placeholder="サンプル出品者1" value="{{ old('name', $member->name) }}" />
                    @if ($errors->has('name'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('name') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('経歴') }}</span>
                    </label>
                    <textarea class="tw-textarea tw-text-sm tw-textarea-bordered tw-w-full @if($errors->has('career')) tw-border-error @endif" id="career" name="career" placeholder="これが私の経歴です。" value="{{ old('career') }}" rows="8">{{ $member->career }}</textarea>
                    @if ($errors->has('career'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('career') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('自己PR') }}</span>
                    </label>
                    <textarea class="tw-textarea tw-text-sm tw-textarea-bordered tw-w-full @if($errors->has('introduction')) tw-border-error @endif" id="introduction" name="introduction" placeholder="これが私の自己PRです。" value="{{ old('introduction') }}" rows="8">{{ $member->introduction }}</textarea>
                    @if ($errors->has('introduction'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('introduction') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('プロフィール画像') }}</span>
                    </label>
                    <img src="{{ $member->profile_img_url }}" alt="{{ $member->name }}" class="tw-w-full tw-h-52 lg:tw-h-64 tw-object-cover tw-mb-4">
                    <input type="file" class="tw-file-input tw-text-sm tw-file-input-bordered tw-w-full" name="profile_img" />
                    @if ($errors->has('profile_img'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('profile_img') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('Facebook') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('facebook_url')) tw-border-error @endif" id="facebook_url" name="facebook_url" type="text" placeholder="https://facebook.com/sample-member-1" value="{{ old('facebook_url', $member->facebook_url) }}" />
                    @if ($errors->has('facebook_url'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('facebook_url') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('Instagram') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('instagram_url')) tw-border-error @endif" id="instagram_url" name="instagram_url" type="text" placeholder="https://instagram.com/sample-member-1" value="{{ old('instagram_url', $member->instagram_url) }}" />
                    @if ($errors->has('instagram_url'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('instagram_url') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('TikTok') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('tiktok_url')) tw-border-error @endif" id="tiktok_url" name="tiktok_url" type="text" placeholder="https://tiktok.com/sample-member-1" value="{{ old('tiktok_url', $member->tiktok_url) }}" />
                    @if ($errors->has('tiktok_url'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('tiktok_url') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('Twitter') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('twitter_url')) tw-border-error @endif" id="twitter_url" name="twitter_url" type="text" placeholder="https://twitter.com/sample-member-1" value="{{ old('twitter_url', $member->twitter_url) }}" />
                    @if ($errors->has('twitter_url'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('twitter_url') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-8">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('YouTube') }}</span>
                    </label>
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('youtube_url')) tw-border-error @endif" id="youtube_url" name="youtube_url" type="text" placeholder="https://youtube.com/sample-member-1" value="{{ old('youtube_url', $member->youtube_url) }}" />
                    @if ($errors->has('youtube_url'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('youtube_url') }}</span>
                    </label>
                    @endif
                </div>
                <button class="tw-btn tw-btn-info tw-btn-block" type="submit">
                    {{ __('更新する') }}
                </button>
            </form>
        </div>
    </section>
</x-admin-layout>