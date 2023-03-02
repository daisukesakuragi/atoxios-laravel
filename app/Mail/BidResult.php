<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class BidResult extends Mailable
{
    use Queueable, SerializesModels;

    public $bid;
    public $plan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bid, $plan)
    {
        $this->bid = $bid;
        $this->plan = $plan;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: '【ATOXIOS株式会社 落札確定のお知らせ】' . $this->bid->user->name . '様',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $due_date = new Carbon('+2 day');
        $event_held_at = new Carbon($this->plan->event_held_at);
        $event_meeting_time = new Carbon($this->plan->event_meeting_time);

        return new Content(
            markdown: 'emails.bid-result',
            with: [
                'app_url' => config('app.url'),
                'user_name' => $this->bid->user->name,
                'member_name' => $this->plan->member->name,
                'plan' => $this->plan,
                'price' => number_format($this->bid->price),
                'due_date' => $due_date->format('Y年m月d日'),
                'event_held_at' => $event_held_at->format('Y年m月d日 H時i分'),
                'event_location' => $this->plan->event_location,
                'event_meeting_location' => $this->plan->event_meeting_location,
                'event_meeting_time' => $event_meeting_time->format('H時i分'),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
