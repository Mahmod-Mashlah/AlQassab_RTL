<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [

        'mark',

        'subject_id',
        'season_id',
        'student_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function marks()
    {
        return $this->belongsTo(MarkRecord::class);
    }
}
