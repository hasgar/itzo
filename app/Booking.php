<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
      protected $table = 'booking';
  public function healthcare()
  {
    return $this->hasMany('App\Healthcare', 'id', 'healthcare_id');
  }
   public function user()
  {
    return $this->hasMany('App\Users', 'user_id', 'user_id');
  }
   
}
