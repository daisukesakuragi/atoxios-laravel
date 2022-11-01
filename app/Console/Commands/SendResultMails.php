<?php

namespace App\Console\Commands;

use App\Models\Plan;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
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
    protected $description = '入札期間終了後に、入札金額が高い上位3ユーザーに対して、入札結果を通知するメールを送ります。';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('Start this job.');

        $now = new Carbon();

        $plans = Plan::with('bids.user')->where('is_sent_result_mail', '=', false)->where('finished_at', '<', $now)->get()->map(function ($query) {
            $query->setRelation('bids', $query->bids->take(1));
            return $query;
        });

        if (count($plans) === 0) {
            Slack::send('入札結果通知メールの送信対象となる企画が見つかりませんでした。');

            return 0;
        }

        foreach ($plans as $plan) {
            $bids = $plan->bids;
            $bid = $bids[0];
            Slack::send($plan->finished_at . '時点で、「' . $plan->title .  '」の入札期間が終了しました。ID: ' . $bid->user->id . 'のユーザーが、' . $bid->price . '円で落札しましたので、落札結果メールを送信します。');
            // TODO: メール送信処理を書いたら、下記のコメントアウトを外す
            // $plan->is_sent_result_mail = true;
            // $plan->save();
        }

        return 0;
    }
}
