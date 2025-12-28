<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'fullname', 'nim', 'gender', 'date_of_birth',
        'phone', 'address', 'study_program', 'graduation_date', 'npwp',
        'company', 'company_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responses()
    {
        return $this->hasMany(UserResponse::class, 'user_id');
    }
}

