<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
	public function mcq_options(){
		return $this->hasMany('App\Mcq_answer');
    }
}
