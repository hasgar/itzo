<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthcareFecilities extends Model
{
     protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
    
    public function fecility()
  {
    return $this->hasMany('App\Fecilities', 'id', 'fecility_id');
  }
}
