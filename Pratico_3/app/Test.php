<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [ 'id', 'user_id', 'procedure_id', 'date' ];
}
Test::where('id', true)->delete();
