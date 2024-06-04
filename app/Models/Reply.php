<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [

        'reply',

        'comment_id',
        'teacher_id',

        'created_at',
        'updated_at'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
}
