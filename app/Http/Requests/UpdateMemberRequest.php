<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'slug' => [
                'required', 'string', 'min:1', 'max:255', Rule::unique('members')->whereNull('deleted_at')->ignore($this->id)
            ],
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'career' => ['required', 'min:1', 'max:150', 'string'],
            'introduction' => ['required', 'min:1', 'max:150', 'string'],
            'profile_img' => ['nullable', 'image'],
            'instagram_url' => ['nullable', 'url', 'active_url'],
            'tiktok_url' => ['nullable', 'url', 'active_url'],
            'twitter_url' => ['nullable', 'url', 'active_url'],
            'youtube_url' => ['nullable', 'url', 'active_url'],
        ];
    }
}
