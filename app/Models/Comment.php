<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 「１対１」→ メソッド名は単数形
    Public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    // 「１対１」→ メソッド名は単数形
    Public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
    use HasFactory;
}
