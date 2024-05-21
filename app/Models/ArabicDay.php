<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicDay extends Model
{
    use HasFactory;
    protected $fillable = [

        'day',
        'created_at',
        'updated_at',
    ];
}
