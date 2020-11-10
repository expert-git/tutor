<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getAllPages(){
    	return $this->all();
    }

    public function getSinglePage($id){
    	return $this->where('id', $id)->first();
    }
}
