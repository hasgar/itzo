<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Healthcare extends Model
{
        protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
      protected $table = 'healthcare';
    
}
