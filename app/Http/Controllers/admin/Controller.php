<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Activity_log;
use Auth;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $footer_subjs;
    
    public function __construct(){
    //     $user = User::find(Auth::user()->id);
    //    dd(User::find(4)->notifications);

    //     foreach ($user->notifications as $notification) {
    //        dd($notification);
    //     }

    }

    //generic function for initializing session
    protected function set_session($msg, $status){
	     session()->put('result', $status);
	     session()->put('msg', $msg);
    }



    protected function logActivity($activity){

    	$activity_log = new Activity_log();
    	$activity_log->user_id = Auth::user()->id;
    	$activity_log->text = $activity;
    	$activity_log->ip_address = $_SERVER['REMOTE_ADDR'];
    	$activity_log->save();
    }

    public function notifications(){
    
    }
}
