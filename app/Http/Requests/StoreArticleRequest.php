<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreArticleRequest extends FormRequest
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
            'slug' => 'required|string|min:1|max:255|unique:articles,slug',
            'title' => 'required|string|min:1|max:255',
            'description' => 'required|string|min:1|max:150',
            'thumbnail' => 'required|image',
            'body' => 'required',
        ];
    }
}
