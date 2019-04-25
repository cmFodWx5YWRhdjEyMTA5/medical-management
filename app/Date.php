<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
     public function doctors(){

	return $this->belongsToMany('App\Doctor')->withTimestamps();

    }
}
