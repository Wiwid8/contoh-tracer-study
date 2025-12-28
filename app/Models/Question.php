<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'questionnaire_id', 'code', 'question_text', 'answer', 'answer_type', 'required_status', 'validation_rules'
    ];

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function responsesDetail()
    {
        return $this->hasMany(ResponseDetail::class);
    }
}

