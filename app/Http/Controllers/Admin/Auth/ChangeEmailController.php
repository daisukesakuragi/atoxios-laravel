<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ChangeEmailController extends Controller
{
    public function index()
    {
        return view('admin.auth.change-email');
    }

    public function update(Request $request)
    {
        $request->validate([
            'new_email' => 'required',
            'new_email_confirmation' => 'required',
        ]);

        if ($request->new_email !== $request->new_email_confirmation) {
            session()->flash("error", "新しいメールアドレスと確認用のメールアドレスが一致しません。");

            return back()->withInput();
        }

        if (auth()->user()->email === $request->new_email) {
            session()->flash("error", "新しいメールアドレスを入力してください。");

            return back()->withInput();
        }

        Admin::whereId(auth()->user()->id)->update([
            'email' => $request->new_email
        ]);

        session()->flash('success', 'メールアドレスを変更しました。');

        return back();
    }
}
