<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Activity_log;
use Auth;
use App\User;
use App\Subject;
use App\Tutor_subject;
use App\Country;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){

        $subjects = Subject::limit(9)->get();

        \Session::push('subjects', $subjects);

        //Get Countries with a listing of tutors
        \Session::forget('countries');
        //Random countries fetch
        $countries = Country::whereIn('id', [240, 231, 230, 167, 231, 64, 21])->get();
        \Session::push('countries', $countries);
       // dd($countries);
    }
    
    //generic function for initializing session
    protected function set_session($msg, $status){
	     session()->put('result', $status);
	     session()->put('msg', $msg);
    }

    protected function logActivity($activity){
    	$activity_log = new Activity_log();
        
        if(Auth::check()){
            $activity_log->user_id = Auth::user()->id;
        }else{
            $activity_log->user_id = NULL;
        }


    	$activity_log->text = $activity;
    	$activity_log->ip_address = $_SERVER['REMOTE_ADDR'];
    	$activity_log->save();
    }

}
