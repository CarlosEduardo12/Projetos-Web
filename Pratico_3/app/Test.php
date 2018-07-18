<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [ 'id', 'user_id', 'procedure_id', 'date' ];

    public function procedure() {
        return $this->belongsTo('App\procedure');
      }   
}
