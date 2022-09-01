<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'career',
        'introduction',
        'profile_img_id',
        'profile_img_url',
        'instagram_url',
        'tiktok_url',
        'twitter_url',
        'youtube_url',
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
