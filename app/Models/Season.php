<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'season_start',
        'season_end',
        'days_number',

        'year_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}