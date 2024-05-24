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
}
