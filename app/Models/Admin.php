<?php

namespace App\Models;

use App\User;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
// use Tightenco\Parental\HasParent;

// Very important !!
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one

class Admin extends User
{
    // use HasParent;
    use HasRoles; // <------ and this

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password'];
    // protected $hidden = [];
    // protected $dates = [];

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }
}
