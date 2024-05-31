<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'min',
        'max',

        'school_class_id',
        'teacher_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
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

    public function marks()
    {
        return $this->hasMany(MarkRecord::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
