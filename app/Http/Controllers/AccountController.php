<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\User;
use App\Models\Withdrawal;
use App\Http\Requests\WithdrawalRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    public function index()
    {
        return view('account');
    }

    public function showBidHistory()
    {
        $bids = Bid::with(['user', 'plan'])->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('history', compact('bids'));
    }

    public function showWithdrawalForm()
    {
        $user = User::with('bids')->find(auth()->id());

        $is_withdrawalable = $user->checkIfUserCanWithdrawal();

        return view('withdrawal', compact('is_withdrawalable'));
    }

    public function withdrawal(WithdrawalRequest $request)
    {
        try {
            User::find(auth()->user()->id)->delete();

            Withdrawal::create([
                'user_id' => auth()->user()->id,
                'reason' => intval($request->reason),
                'content' => $request->content
            ]);

            session()->flash('success', '退会しました。ご利用いただきありがとうございました。');

            return redirect(route('welcome'));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '退会に失敗しました。');

            return back();
        }
    }
}
