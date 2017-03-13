<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthcareTypes extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    public function types()
  {
    return $this->hasMany('App\Types', 'id', 'type_id');
  }
}
