<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidRequest;
use App\Models\Bid;
use App\Models\Plan;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class BidController extends Controller
{
    public function bid(BidRequest $request)
    {
        try {
            $plan = Plan::findOrFail($request->plan_id);

            $latest = Bid::where('plan_id', '=', $plan->id)
                ->latest('created_at')
                ->first();

            if ($latest) {
                if ($latest->price >= $request->price) {
                    session()->flash('error', $request->price . '円での入札に失敗しました。最新の入札価格が、' . $latest->price . '円に更新されています。');

                    return back();
                }

                $next = $latest->price + 100000;

                if ($next < $request->price) {
                    session()->flash('error', '入札に失敗しました。現在の入札金額の上限は、' . $latest->price + 100000 . '円です。');

                    return back();
                }
            }

            $bid = Bid::create([
                'plan_id' => $plan->id,
                'user_id' => $request->user_id,
                'price' => $request->price
            ]);

            session()->flash('success', $bid->price . '円での入札に成功しました。');

            return redirect(route('plans.show', $plan->slug));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '入札に失敗しました。申し訳ございませんが、少し時間を置いてから再度入札してください。');

            return back();
        }
    }
}
