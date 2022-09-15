<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidRequest;
use App\Models\Bid;
use App\Models\Plan;
use Exception;
use Illuminate\Support\Facades\Log;

class BidController extends Controller
{
    public function bid(BidRequest $request)
    {
        try {
            $plan = Plan::findOrFail($request->plan_id);

            $is_biddable_by_price = $plan->checkIfPlanIsBiddableByPrice($request->price);
            $is_biddable_by_date_time = $plan->checkIfPlanIsBiddableByDateTime();

            if ($is_biddable_by_price && $is_biddable_by_date_time) {
                $bid = Bid::create([
                    'plan_id' => $plan->id,
                    'user_id' => $request->user_id,
                    'price' => $request->price
                ]);

                session()->flash('success', $bid->price . '円での入札に成功しました。');

                return redirect()->route('plans.show', $plan->slug);
            }

            if (!$is_biddable_by_price) {
                session()->flash('error', $request->price . '円で入札することができませんでした。');
            } elseif (!$is_biddable_by_date_time) {
                session()->flash('error', '現在は入札可能期間外です。');
            }

            return back();
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '入札に失敗しました。申し訳ございませんが、少し時間を置いてから再度入札してください。');

            return back();
        }
    }
}
