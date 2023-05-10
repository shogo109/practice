<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  Public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
  //hasMany設定
  Public function likes()
  {
    return $this->hasMany('App\Models\Like');
  }
  Public function likedBy($user)
  {
    return Like::where('user_id', $user->id)->where('post_id', $this->id);
  }
  //hasMany設定
  Public function comments()
  {
    return $this->hasMany('App\Models\Comment');
  }
    //　削除する必要あり？
    use HasFactory;
}
