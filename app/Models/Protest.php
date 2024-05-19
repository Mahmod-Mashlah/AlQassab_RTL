<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',

        'user_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
