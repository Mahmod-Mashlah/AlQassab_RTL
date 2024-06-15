<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [

        'lecture_number',
        'date',
        'summery',
        'ideas',

        'teacher_id',
        'subject_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function lesson_files()
    {
        return $this->hasMany(FileLesson::class);
    }
}
