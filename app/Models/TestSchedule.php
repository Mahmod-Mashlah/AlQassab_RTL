<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSchedule extends Model
{
    use HasFactory;
    protected $fillable = [

        'file_id',
        'season_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function file()
    {
        return $this->hasOne(File::class);
    }
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}