<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'image_id',

        'password',

        'mother_name',
        'birth_place',
        'restrict_place',
        'nationality',
        'family_mode',
        'children_number',
        'family_compensation_number',
        'work_date',
        'school_from',
        'book_number',
        'book_date',
        'work_start_date',
        'leave_date',
        'school_to',
        'military_is',
        'military_rank',
        'salary_place',
        'address',
        'phone',
        'certifications',


        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->belongsTo(File::class);
    }
}
