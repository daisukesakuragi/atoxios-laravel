<?php

namespace App\Services;

use App\Notifications\SlackNotification;
use Illuminate\Notifications\Notifiable;

class SlackService
{
    use Notifiable;

    public function send($message = null)
    {
        $this->notify(new SlackNotification($message));
    }

    public function routeNotificationForSlack()
    {
        return config('app.slack_webhook_url');
    }
}
