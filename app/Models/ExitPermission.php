<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExitPermission extends Model
{
    use HasFactory;
    protected $fillable = [

        'reason',
        'date',

        'mentor_id',
        'student_id',
        'class_id',
        // 'section_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }
}
