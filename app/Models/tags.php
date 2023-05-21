<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    Public function posts()
    {
      return $this->belongsTo('App\Models\Post');
    }
    protected $fillable = ['tag_label'];
    use HasFactory;
}
