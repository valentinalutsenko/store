<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //шифруем пароль
    public function setPasswordAttribute($value): string
    {
        return $this->attributes['password'] = bcrypt($value);
    }

    public function isAdmin(): bool
    {
        $admin_emails = config('settings.admin_emails');
        if(in_array($this->email, $admin_emails)) {
            return true;
        } else {
            return false;
        }
    }
}
