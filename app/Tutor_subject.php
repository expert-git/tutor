<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor_subject extends Model
{
    protected $table = 'tutor_subjects';
    protected $fillable = [
        'tutor_id','subject_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
