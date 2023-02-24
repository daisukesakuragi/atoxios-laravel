<?php

namespace App\Models;

use App\Notifications\CustomVerifyEmail;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function checkIfUserCanWithdrawal(): bool
    {
        // MEMO: ユーザーが開催期間中の企画に入札している場合は退会できない
        $result = true;
        $bids = $this->bids()->get();
        $now = new Carbon();

        foreach ($bids as $bid) {
            $started_at = new Carbon($bid->plan->started_at);
            $finished_at = new Carbon($bid->plan->finished_at);

            if ($now->between($started_at, $finished_at)) {
                $result = false;
            }
        }

        return $result;
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($user) {
            $user->bids()->delete();
        });
    }
}
