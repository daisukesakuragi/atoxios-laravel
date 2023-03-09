<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StorePlanRequest extends FormRequest
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
            'member_id' => [
                'required', Rule::exists('members', 'id')->whereNull('deleted_at')
            ],
            'slug' => [
                'required',
                'string',
                'min:1',
                'max:255',
                Rule::unique('plans')->whereNull('deleted_at')
            ],
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'eyecatch_img' => ['required', 'image'],
            'description' => ['required', 'min:1', 'max:150', 'string'],
            'started_at' => ['required', 'date', 'after:today'],
            'finished_at' => ['required', 'date', 'after:started_at'],
            'event_held_at' => ['required', 'date', 'after:finished_at'],
            'event_location' => ['required', 'string', 'min:1', 'max:255'],
            'event_meeting_location' => ['required', 'string', 'min:1', 'max:255'],
            'event_meeting_time' => ['required']
        ];
    }
}
