<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'company', 'location', 'posted_by'];

    public function poster() {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
