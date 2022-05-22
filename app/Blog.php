<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $fillable = [
      'user_id', 'blog_name', 'blog_description', 'blog_image',
  ];

  function user()
  {
    return $this->belongsTo('App\User');
  }
}
