<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\GoogleCalendar\Event;

class GoogleCalender extends Controller
{
    //

    public function all_events(){
    	$events = Event::get();
    	dd($events);
    }
}
