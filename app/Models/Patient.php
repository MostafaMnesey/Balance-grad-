<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Patient extends Model
{
    use HasApiTokens;
    protected $fillable = ['user_id', 'date_of_birth', 'gender', 'status', 'adress'];

    // جلب بيانات المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
