<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mcq_answer extends Model
{
	public function mcq(){
		return $this->hasOne('App\Mcq');
    }
}
