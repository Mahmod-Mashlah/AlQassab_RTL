<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\File;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Contracts\LaratrustUser;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    use HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        // also we define function below can use the
        // 'full_name'
        'birth_date',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getFullNameAttribute()
    {
        // The getFullNameAttribute function will automatically be accessible
        // as $user->full_name.
        return trim("{$this->first_name}.' '.{$this->middle_name}.' '.{$this->last_name}");
    }

    public function protests()
    {
        return $this->hasMany(Protest::class);
    }
    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
    public function mentor_classes()
    {
        return $this->hasMany(SchoolClass::class);
    }
    public function teacher_subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }
    public function tests()
    {
        return $this->hasMany(Test::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function marks()
    {
        return $this->hasMany(MarkRecord::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
