<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   	protected $table = 'reviews';
    protected $fillable = [
        'student_id','tutor_id','job_id','comments','rating'
    ];
}
