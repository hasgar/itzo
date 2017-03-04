<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

  protected $table = 'area';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'city_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'id',
  ];
}
