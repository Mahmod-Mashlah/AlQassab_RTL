<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year_start',
        'year_end',
        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function marks()
    {
        return $this->hasMany(MarkRecord::class);
    }
    public function classes()
    {
        return $this->hasMany(SchoolClass::class);
    }
}
