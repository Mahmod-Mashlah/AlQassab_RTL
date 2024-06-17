<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'season_start',
        'season_end',
        'days_number',

        'year_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }
    public function tests()
    {
        return $this->hasMany(Test::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function day_schedule()
    {
        return $this->hasOne(DaySchedule::class);
    }

    public function test_schedule()
    {
        return $this->hasOne(TestSchedule::class);
    }

    // public function daily_schedule()
    // {
    //     return $this->hasOne(DailySchedule::class);
    // }
}
