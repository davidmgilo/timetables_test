<?php

namespace App;

use App\Notifications\CustomResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Scool\Foundation\User as FoundationUser;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 */
class User extends FoundationUser
{
    // Has to be the same as in foundation TODO
    use  HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'github_id', 'avatar', 'facebook_id', 'google_id', 'twitter_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        //        $when = Carbon::now()->addMinutes(1);
        $this->notify(new CustomResetPasswordNotification($token));
    }

    public function lessons()
    {
        return $this->belongsToMany(\Scool\Timetables\Models\Lesson::class);
    }
}
