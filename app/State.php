<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
