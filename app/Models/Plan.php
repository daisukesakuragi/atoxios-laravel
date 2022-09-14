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
        'started_at',
        'finished_at',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function checkIfPlanIsBiddableByDateTime(): bool
    {
        $started_at = new Carbon($this->started_at);
        $finished_at = new Carbon($this->finished_at);
        $now = new Carbon();

        if (!$now->between($started_at, $finished_at)) {
            session()->flash('error', 'こちらの企画は入札可能期間外です。');

            return false;
        }

        return true;
    }

    public function checkIfPlanIsBiddableByPrice(int $price): bool
    {
        $latest_bid = Bid::where('plan_id', '=', $this->id)
            ->orderBy('price', 'desc')
            ->first();

        if ($latest_bid) {
            if ($latest_bid->price >= $price) {
                session()->flash('error', $price . '円での入札に失敗しました。最新の入札可能価格は、' . $latest_bid->price . '円です。');

                return false;
            }

            $next = $latest_bid->price + 100000;

            if ($next < $price) {
                session()->flash('error', '入札に失敗しました。現在の入札金額の上限は、' . $next . '円です。');

                return false;
            }
        }

        return true;
    }
}
