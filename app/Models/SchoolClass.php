<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'number',
        'section_count',

        'mentor_id',
        'year_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function mentor()
    {
        return $this->belongsTo(User::class);
    }
    public function year()
    {
        return $this->belongsTo(year::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'class_student_section', 'class_id');
    }
}
