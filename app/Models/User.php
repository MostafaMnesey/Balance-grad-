<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = ['name', 'email', 'password', 'type', 'profile_picture'];

    // إذا كان المستخدم طبيب
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    // إذا كان المستخدم مريض
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}
