<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login_index(){
    	$data['login'] = true;
    	return view('admin.auth.login')->with($data);
    }

    public function login_post(Request $request){

      try{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password ] )) {

               $this->logActivity('Logged in');
			         $this->set_session('Logged in', true);
            
            }else{
            	$this->set_session('Invalid Email/Password', false);
            	return redirect()->route('adminlogin_index');
            }

               return redirect()->route('admin-index');            


      }catch(\Exception $e){
               $this->set_session('Oops. Something went wrong, Please Try again.'.$e->getMessage(), false);
               return redirect()->route('adminlogin_index');  
      }                      
   	
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('adminlogin_index');
    }
}
