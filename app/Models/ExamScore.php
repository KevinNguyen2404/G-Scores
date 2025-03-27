<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamScore extends Model
{
    protected $table = 'exam_scores';
    protected $fillable = [
        'registration_number', 'math', 'literature', 'foreign_language', 'physics',
        'chemistry', 'biology', 'history', 'geography', 'civic_education', 'foreign_language_code'
    ];
}