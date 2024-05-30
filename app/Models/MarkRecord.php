<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkRecord extends Model
{
    use HasFactory;
    protected $fillable = [

        'sum1',
        'sum2',

        'final_sum',

        'final_result',

        'year_id',
        'subject_id',
        'student_id',

        'homework1_id',
        'test1_id',
        'exam1_id',

        'homework2_id',
        'test2_id',
        'exam2_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function homework1()
    {
        return $this->hasOne(Homework::class, "id");
    }
    public function homework2()
    {
        return $this->hasOne(Homework::class, "id");
    }
    public function test1()
    {
        return $this->hasOne(Homework::class, "id");
    }
    public function test2()
    {
        return $this->hasOne(Homework::class, "id");
    }
    public function exam1()
    {
        return $this->hasOne(Homework::class, "id");
    }
    public function exam2()
    {
        return $this->hasOne(Homework::class, "id");
    }
}
