<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'member_id',
        'slug',
        'title',
        'eyecatch_img_id',
        'eyecatch_img_url',
        'description',
        'is_sent_result_mail',
        'started_at',
        'finished_at',
        'event_held_at',
        'event_location',
        'event_meeting_location',
        'event_meeting_time',
    ];

    protected $casts = [
        'is_sent_result_mail' => 'boolean',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class)->orderBy('price', 'desc');
    }

    public function checkIfPlanIsBiddableByDateTime(): bool
    {
        $started_at = new Carbon($this->started_at);
        $finished_at = new Carbon($this->finished_at);
        $now = new Carbon();

        return $now->between($started_at, $finished_at);
    }

    public function checkIfPlanIsBiddableByPrice(int $price): bool
    {
        $price_diff = config('app.price_diff') ? intval(config('app.price_diff')) : 5000;

        $latest = Bid::where('plan_id', '=', $this->id)
            ->orderBy('price', 'desc')
            ->first();

        if ($latest) {
            return intval($latest->price) + $price_diff === $price;
        }

        return true;
    }

    public function generatePlanStatusLabel(): array
    {
        $started_at = new Carbon($this->started_at);
        $finished_at = new Carbon($this->finished_at);
        $now = new Carbon();

        if ($now->lt($started_at)) {
            return [
                'status_label' => '近日開催！',
                'status_color' => 'tw-badge-info'
            ];
        } else if ($now->between($started_at, $finished_at)) {
            return [
                'status_label' => '開催中です',
                'status_color' => 'tw-badge-error'
            ];
        } else if ($now->gt($finished_at)) {
            return [
                'status_label' => '終了しました',
                'status_color' => 'tw-badge-accent'
            ];
        }
    }
}
