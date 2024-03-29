<?php

namespace App\Console\Commands;

use App\Mail\BidResult;
use App\Models\Plan;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Mail;
use Slack;

class SendResultMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendResultMails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '入札期間終了後に、入札金額が最も高いユーザーに対して、結果を通知するメールを送ります。';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $now = new Carbon();

            $plans = Plan::with('bids.user')->where('is_sent_result_mail', '=', false)->where('finished_at', '<', $now)->get()->map(function ($query) {
                $query->setRelation('bids', $query->bids->take(1));

                return $query;
            });

            if (count($plans) === 0) {
                Slack::send('入札結果通知メールの送信対象となる企画は見つかりませんでした。');

                return 0;
            }

            foreach ($plans as $plan) {
                $bids = $plan->bids;

                if (count($bids) > 0) {
                    $bid = $bids[0];

                    Slack::send($plan->finished_at . '時点で、「' . $plan->title .  '」の入札期間が終了しました。ID: ' . $bid->user->id . 'のユーザーが、' . $bid->price . '円で落札しましたので、落札結果メールを送信します。');

                    Mail::to($bid->user->email)->send(new BidResult($bid, $plan));
                } else {
                    Slack::send($plan->finished_at . '時点で、「' . $plan->title .  '」の入札期間が終了しました。落札者が見つからなかったため、メール送信処理は実行されません。');
                }

                $plan->is_sent_result_mail = true;
                $plan->save();
            }

            return 0;
        } catch (Exception $e) {
            Log::error($e);

            return 0;
        }
    }
}
