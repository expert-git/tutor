<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	 protected $table = 'subjects';

	public function grade(){
		return $this->hasOne('App\Grade');
	}
}
