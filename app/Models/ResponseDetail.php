<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_response_id', 'question_text', 'answer_text', 'other_answer', 'matrix_answers'
    ];

    public function userResponse()
    {
        return $this->belongsTo(UserResponse::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_text', 'question_text');
    }
}

