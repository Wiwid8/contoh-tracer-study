<?php


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email', 'password', 'role', 'provider', 'provider_id',
        'verification_string', 'pp_url', 'last_login_at', 'otp_code', 'otp_expires_at'
    ];

    protected $hidden = ['password'];

    public function alumni()
    {
        return $this->hasOne(Alumni::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function userResponses()
    {
        return $this->hasMany(UserResponse::class);
    }
}

