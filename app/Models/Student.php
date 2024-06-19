<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [

        'serial_number',
        'last_serial_number',
        'father_work',
        'grandfather_name',
        'mother_name',
        'birth_place',
        'restrict_place',
        'restrict_number',
        'nationality',
        'in_date',
        'from_school',
        'failed_class',
        'phone_number',
        'password',
        'parent_password',



        'user_id',
        'class_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function class()
    {
        return $this->belongsToMany(SchoolClass::class, 'class_student_section', 'student_id');
    }
}
