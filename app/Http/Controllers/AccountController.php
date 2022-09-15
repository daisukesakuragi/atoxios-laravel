<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\User;
use App\Models\Withdrawal;
use App\Http\Requests\WithdrawalRequest;
use Artesaos\SEOTools\Facades\SEOTools;
use Exception;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('アカウント');
        SEOTools::setDescription('こちらは' . auth()->user()->name . '様のアカウントページです。');

        return view('account');
    }

    public function showBidHistory()
    {
        SEOTools::setTitle('入札履歴');
        SEOTools::setDescription('こちらは' . auth()->user()->name . '様の入札履歴に関するページです。');

        $bids = Bid::with(['user', 'plan'])->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('history', compact('bids'));
    }

    public function showWithdrawalForm()
    {
        SEOTools::setTitle('退会');
        SEOTools::setDescription('こちらは退会ページです。');

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

            session()->flash('success', '退会しました。');

            return redirect(route('welcome'));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '退会に失敗しました。');

            return back();
        }
    }
}
