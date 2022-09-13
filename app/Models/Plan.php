<?php

namespace App\Models;

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
}
