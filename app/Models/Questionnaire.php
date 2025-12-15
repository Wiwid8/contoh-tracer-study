<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'questions']; // questions bisa JSON untuk pertanyaan dinamis

    public function responses() {
        return $this->hasMany(Response::class);
    }
}
