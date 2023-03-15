<x-admin-layout>
    <section class="tw-pt-24 tw-pb-16">
        <div class="tw-container tw-max-w-screen-sm">
            <x-admin-page-title title="記事の新規作成"></x-admin-page-title>
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                    <input class="tw-input tw-text-sm tw-input-bordered tw-w-full @if($errors->has('title')) tw-border-error @endif" id="title" name="title" type="text" placeholder="サンプル記事1" value="{{ old('title') }}" />
                    @if ($errors->has('title'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('title') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('説明文') }}</span>
                    </label>
                    <textarea class="tw-textarea tw-text-sm tw-textarea-bordered tw-w-full @if($errors->has('description')) tw-border-error @endif" id="description" name="description" placeholder="これがサンプル記事1の説明文です。" value="{{ old('description') }}" rows="4"></textarea>
                    @if ($errors->has('description'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('description') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-4">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('サムネイル画像') }}</span>
                    </label>
                    <input type="file" class="tw-file-input tw-text-sm tw-file-input-bordered tw-w-full @if($errors->has('thumbnail')) tw-border-error @endif" name="thumbnail" />
                    @if ($errors->has('thumbnail'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('thumbnail') }}</span>
                    </label>
                    @endif
                </div>
                <div class="tw-form-control tw-mb-8">
                    <label class="tw-label">
                        <span class="tw-label-text">{{ __('本文') }}</span>
                    </label>
                    <textarea class="tw-textarea tw-text-sm tw-textarea-bordered tw-w-full @if($errors->has('body')) tw-border-error @endif" id="body" name="body" placeholder="This is a body text of Sample Article 1." value="{{ old('body') }}" rows="16"></textarea>
                    @if ($errors->has('body'))
                    <label class="tw-label">
                        <span class="tw-label-text tw-text-error">{{ $errors->first('body') }}</span>
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