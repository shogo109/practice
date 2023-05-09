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
  public function likes()
  {
    return $this->hasMany('App\Models\Like');
  }
  public function likedBy($user)
  {
    return Like::where('user_id', $user->id)->where('post_id', $this->id);
  }
    //　削除する必要あり？
    use HasFactory;
}
