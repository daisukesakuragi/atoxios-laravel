<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('admin.auth.change-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            session()->flash("error", "既存のパスワードが正しくありません。");

            return back();
        }

        if ($request->new_password === $request->old_password) {
            session()->flash("error", "新しいパスワードは既存のパスワードと異なるパスワードを入力してください。");

            return back();
        }

        if ($request->new_password !== $request->new_password_confirmation) {
            session()->flash("error", "新しいパスワードと確認用のパスワードが一致しません。");

            return back();
        }

        Admin::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        session()->flash('success', 'パスワードを変更しました。');

        return back();
    }
}
