<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;
    protected $fillable = [

        'title',
        'body',
        'admin_role',
        'target',

        'admin_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
