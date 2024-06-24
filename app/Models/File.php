<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',

        'user_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lesson()
    {
        return $this->belongsTo(FileLesson::class);
    }
    public function note()
    {
        return $this->belongsTo(FileNote::class);
    }
    public function day_schedule()
    {
        return $this->belongsTo(DaySchedule::class);
    }
    // public function test_schedule()
    // {
    //     return $this->belongsTo(TestSchedule::class, 'id');
    // }
    public function exam_schedule()
    {
        return $this->belongsTo(ExamSchedule::class);
    }
}
