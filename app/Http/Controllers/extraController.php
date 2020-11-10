<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class extraController extends Controller
{
    //
    public function review()
    {
    	return view('dashboard.reviews.lecturelist');
    }
}
