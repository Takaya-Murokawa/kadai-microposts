<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    //
    protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
       //投稿をファボしたユーザ    主語を意識
    public function favorites_users()
    {
        return $this->belongsToMany(User::class, 'favorites','mucropost_id','user_id')->withTimestamps();
    }
    
    
    
    
}
