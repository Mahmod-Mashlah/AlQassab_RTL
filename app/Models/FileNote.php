<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileNote extends Model
{
    use HasFactory;
    protected $fillable = [

        'file_id',
        'note_id',

        'created_at',
        'updated_at'
    ];

    // public $timestamps = true;

    public function file()
    {
        return $this->hasOne(File::class);
    }
    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
