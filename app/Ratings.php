<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
   protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
      protected $table = 'ratings';
      public function user()
  {
    return $this->hasMany('App\User', 'id', 'user_id');
  }
}
