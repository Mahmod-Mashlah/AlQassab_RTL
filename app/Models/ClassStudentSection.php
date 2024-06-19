<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassStudentSection extends Pivot
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'student_id',
        'section_id',
        'class_id',
        'year_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    public function class()
    {
        return $this->belongsTo(SchoolClass::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
