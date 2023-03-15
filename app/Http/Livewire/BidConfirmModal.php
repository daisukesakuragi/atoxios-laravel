<?php

namespace App\Http\Livewire;

use App\Models\Bid;
use App\Models\Plan;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Slack;

class BidConfirmModal extends Modal
{
    public $user;
    public $plan;
    public $price;

    public function mount(User $user, Plan $plan, int $price)
    {
        $this->user = $user;
        $this->plan = $plan;
        $this->price = $price;
    }

    public function render()
    {
        return view('livewire.bid-confirm-modal');
    }

    public function bid()
    {
        try {
            if (!$this->user->hasVerifiedEmail()) {
                session()->flash('error', 'メールアドレスの確認が済んでいません。');

                return redirect()->route('plans.show', $this->plan->slug);
            }

            $is_biddable_by_price = $this->plan->checkIfPlanIsBiddableByPrice($this->price);
            $is_biddable_by_date_time = $this->plan->checkIfPlanIsBiddableByDateTime();

            if ($is_biddable_by_price && $is_biddable_by_date_time) {
                $bid = Bid::create([
                    'plan_id' => $this->plan->id,
                    'user_id' => $this->user->id,
                    'price' => $this->price
                ]);

                // Slack::send('ユーザーID: ' . $this->user->id . ' が「' . $this->plan->title . '」に' . $bid->price . '円で入札しました。');

                session()->flash('success', number_format($bid->price) . '円での入札に成功しました。');
            } else if (!$is_biddable_by_price) {
                session()->flash('error', number_format($this->price) . '円で入札することができませんでした。最低入札金額が更新された可能性があります。');
            } else if (!$is_biddable_by_date_time) {
                session()->flash('error', '現在は入札可能期間外です。');
            } else {
                session()->flash('error', '入札に失敗しました。申し訳ございませんが、少し時間を置いてから再度入札してください。');
            }

            return redirect()->route('plans.show', $this->plan->slug);
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '入札に失敗しました。申し訳ございませんが、少し時間を置いてから再度入札してください。');

            return back();
        }
    }
}
