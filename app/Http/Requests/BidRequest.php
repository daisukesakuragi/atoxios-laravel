<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BidRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'plan_id' => [
                'required', Rule::exists('plans', 'id')->whereNull('deleted_at')
            ],
            'user_id' => [
                'required', Rule::exists('users', 'id')->whereNull('deleted_at')
            ],
            'price' => [
                'required',
                'integer',
            ]
        ];
    }
}
