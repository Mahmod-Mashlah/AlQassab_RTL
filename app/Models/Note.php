<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [

        'type',
        'details',

        'admin_id',
        'student_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function note_files()
    {
        return $this->hasMany(FileNote::class);
    }
}
