<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileLesson extends Model
{
    use HasFactory;
    protected $fillable = [


        'file_id',
        'lesson_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function file()
    {
        return $this->hasOne(File::class);
    }
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
