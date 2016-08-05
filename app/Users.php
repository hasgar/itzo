<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
     protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
      protected $table = 'user';
      public function bookings()
  {
    return $this->hasMany('App\Booking', 'id', 'user_id');
  }
}
