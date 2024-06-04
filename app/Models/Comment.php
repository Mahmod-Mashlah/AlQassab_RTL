<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [

        'comment',

        'student_id',
        'lesson_id',

        'created_at',
        'updated_at'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
