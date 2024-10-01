<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'country',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    // 一番下に以下のメソッドを追加する。
    public function tweets()
    {
    // $thisは、Userモデルそのものと思ってください。
    return $this->hasMany(Tweet::class);
    }
    
    // 🔽 追加 🔽 
    public function likes()
    {
     return $this->belongsToMany(Tweet::class)->withTimestamps();
    }
    
     // ここから下を追記
    public function toUserId()
    {
        return $this->hasMany('App\Models\Reaction', 'to_user_id', 'id');
    }

    public function fromUserId()
    {
        return $this->hasMany('App\Models\Reaction', 'from_user_id', 'id');
    }
}
