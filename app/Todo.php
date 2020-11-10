<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
