<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class procedure extends Model
{
  protected $fillable = [ 'id', 'name', 'price', 'user_id', ];

}
