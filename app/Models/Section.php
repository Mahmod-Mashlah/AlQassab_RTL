<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [

        'section_number',
        'max_students_number',

        'school_class_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }
}
