<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function dates(){

	return $this->belongsToMany('App\Date')->withTimestamps();
    }

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }


}
