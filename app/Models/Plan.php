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

        return $now->between($started_at, $finished_at);
    }

    public function checkIfPlanIsBiddableByPrice(int $price): bool
    {
        $latest = Bid::where('plan_id', '=', $this->id)
            ->orderBy('price', 'desc')
            ->first();

        return intval($latest->price) + 100000 === $price;
    }
}
