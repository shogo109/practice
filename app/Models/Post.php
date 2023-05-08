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
    //　削除する必要あり？
    use HasFactory;
}
