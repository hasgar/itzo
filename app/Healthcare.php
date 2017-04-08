<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Healthcare extends Model
{
        protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
      protected $table = 'healthcare';
    public function rating()
  {
    return $this->hasMany('App\Ratings', 'healthcare_id', 'id');
  }
  public function city()
  {
    return $this->hasMany('App\Cities', 'id', 'city_id');
  }
  public function photo()
  {
    return $this->hasMany('App\Photos', 'healthcare_id', 'id');
  }
}
