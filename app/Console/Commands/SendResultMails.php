<?php

namespace App\Console\Commands;

use App\Models\Plan;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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
        Log::info(now());
        Log::info('End this job.');

        // 入札企画が終了しているが、メール通知がまだ済んでいないPlanを配列で返す
        $now = new Carbon();
        $plans = Plan::with('bids.user')->where('is_sent_result_mail', '=', false)->where('finished_at', '<', $now)->get()->map(function ($query) {
            $query->setRelation('bids', $query->bids->take(1));
            return $query;
        });

        if (count($plans) > 0) {
            foreach ($plans as $plan) {
                $bids = $plan->bids;
            }
        } else {
            Log::info('入札期間が終了し、該当ユーザーに入札結果通知メールを送信していない企画は見つかりませんでした。');
        }

        return 0;
    }
}
