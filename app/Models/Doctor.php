<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Model
{
    use HasApiTokens;
    
    protected $fillable = ['user_id', 'specialization', 'license_number', 'phone_number'];

    // جلب بيانات المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
