<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'slug',
        'title',
        'thumbnail_id',
        'thumbnail_url',
        'description',
        'body',
    ];
}
