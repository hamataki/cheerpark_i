<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mypage extends Model
{
    use HasFactory;
    // ユーザーが持つツイートのリレーション
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }


}
