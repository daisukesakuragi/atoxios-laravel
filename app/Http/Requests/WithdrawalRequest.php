<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class WithdrawalRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'reason' => ['required', 'integer'],
            'content' => ['nullable', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'reason' => '退会理由',
            'content' => 'ご意見・ご要望',
        ];
    }

    public function messages()
    {
        return [
            'reason.required' => ':attributeは必須項目です。',
            'reason.integer' => ':attributeの形式が正しくありません。',
            'content.string' => ':attributeの形式が正しくありません。',
        ];
    }
}
