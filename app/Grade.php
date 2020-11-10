<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    protected $table = 'grades';

    public function subjects(){
        return $this->hasMany('App\Subject');
    }

}
