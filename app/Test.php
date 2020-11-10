<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	public function mcqs(){
		return $this->hasMany('App\Mcq');
    }
      
}
