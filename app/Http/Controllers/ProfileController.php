<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Transaction;
use App\WithdrawWallet;
use App\Wallet;
use Auth;
use Illuminate\Support\Facades\Input;
use DB;
use App\Country;
use App\State;
use App\Lesson_type;
class ProfileController extends Controller
{
	//view profile on dashboard

    public function edit_dashboard(){
        
    	$data['user'] = User::join('profiles', 'profiles.user_id', '=', 'users.id')->where('users.id', Auth::user()->id)->first();
        $data['countries'] = Country::all();
        $data['states'] = State::all();
        $data['lessons'] = Lesson_type::all();
        // dd($date['lessons']);
        
    	return view('dashboard.editprofile')->with($data);
    }
    
    public function editcityForCountryAjax(Request $request)
    {
        $country_name = $request->input('countryID');
        $country_id = urldecode($country_name);
        //return $country_name;
        $cities = DB::table('countries')
            ->select('cities.id', 'cities.name')
            ->join('states', 'states.country_id', '=', 'countries.id')
            ->join('cities', 'cities.state_id', '=', 'states.id')
            ->where("countries.id", '=',$country_id)
            ->get();
        return $cities;
    }

    // edit profile post
    public function edit_profile(Request $request){

          // dd($request->input());
    	 // Validation 

    	/* Validation */
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'bio'=> 'required|string|max:500|min:10',
            'address'=> 'required|string|max:255',
            'zipcode'=> 'required|alpha_num|max:10',
            'countryCode'=> 'required|numeric',
            'phonenum1'=> 'required|numeric',
            'age' => 'required|numeric',
            'qualifications' => 'required|string|max:500',
            'qualification_from' => 'required|string|max:500',
        ]); 


    	try{
	    	//Update User
	    	$user_id = $request->input('user_id');
	    	$user = User::find($user_id);
	    	$user->first_name = $request->input('first_name');
	    	$user->last_name = $request->input('last_name');
	    	///$user->phone_no = $request->input('countryCode').$request->input('phonenum1');
            $user->phone_no =$request->input('phonenum1');
             // dd($user->phone_no);
	    	
            //Update Profile
	    	$profile_array = [ 'tution_per_hour' => $request->input('tution_per_hour'),
	    		'bio' => $request->input('bio'),
	    		'address' => $request->input('address'),
	    		'zipcode' => $request->input('zipcode'),
	    		'city_id' => $request->input('city'),
                'country_id' => $request->input('profile_country'),
                'age' => $request->input('age'), 
                'lesson_type' => $request->input('lesson_type'),
                'gender' => $request->input('gender'),
                'qualifications' => $request->input('qualifications'),
                'qualification_from' => $request->input('qualification_from'),
	    	];

           if(Input::hasFile('profile_pic')){
                //dd(456);
                $file = Input::file('profile_pic');
                $tmpFilePath = '/dashboard/assets/images/profile';
                $tmpFileName = time() . '-' . $file->getClientOriginalName();
                $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
                $path = $tmpFileName;

                $profile_array['profile_pic'] = $path;
            }

    		$profile = Profile::where('user_id', Auth::user()->id)->update($profile_array);

    		if($user->save() && $profile){
                $this->logActivity(Auth::user()->first_name.' edited his profile ');
	            $this->set_session('Profile Successfully Edited.', true);

    		}else{
	            $this->set_session('Profile couldnot be Edited.', false);
    		}

    		 return redirect()->route('edit_dashboard');

        }catch(\Exception $e){
            $this->set_session('Profile couldnot be Edited.'.$e->getMessage(), false);
            return redirect()->route('edit_dashboard');
        }

    	//$user->first_name = $request->input('first_name');

    }


    public function ImageUpload(Request $request){
        $img_name = '';
        if(Input::file('profile_pic')){
          $img_name = $this->UploadImage('profile_pic', Input::file('profile_pic'));
          Profile::where('user_id' ,'=', $request->user_id)->update([
          'profile_pic' => $img_name
          ]);
          $path = asset('public/dashboard/assets/images/profile/').'/'.$img_name;

          $this->logActivity(Auth::user()->first_name.' updated profile image ');
          return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]);
          
          $this->set_session('Image Uploaded successfully', true);

        }else{
            $this->set_session('Image is Not Uploaded. Please Try Again', false);
        return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }
     }

     public function UploadImage($type, $file){
        if( $type == 'profile_pic'){
        $path = 'public/dashboard/assets/images/profile/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }



    public function my_transactions(){
        try{

            $data['transactions'] = Transaction::where('user_id', Auth::user()->id)->get();
            
            return view('dashboard.transactions.transaction')->with($data);
        }
        catch(Exception $e){
            $this->set_session('Oops! something went wrong', false);
            return redirect()->route('dashboard_index');
        }
    }

    public function transaction_detail($id)
    {
        try {
            ///dd('adasda');
            $data['transaction'] = Transaction::where('user_id', Auth::user()->id)->find($id);
            $data['description'] = json_decode($data['transaction']->description);
            //dd($data['description']);

            return view('dashboard.transactions.transaction_detail')->with($data);
            
        } catch (Exception $e) {
            print_r($e);
        }

    }


    public function my_balance()
    {
        $data['transactions'] = Transaction::where('user_id', Auth::user()->id)->take(3)->orderBy('created_at', 'desc')->get();
        $data['withdraw'] = WithdrawWallet::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $data['wallet'] = DB::table('wallets')->where('user_id','=',Auth::user()->id)->first(['balance']);

        return view('dashboard.transactions.balance')->with($data);
    }

    public function walletWithdraw(Request $request){

        //100$ withdraw amount condition
        
        if($request->input('amount') < 10){
            $this->set_session('You cannot withdraw amount less then $10', false);
            return redirect()->route('my_balance'); 
        }

        $available = Wallet::where('user_id', Auth::user()->id)->first(['balance']);

        $status = WithdrawWallet::where('user_id', Auth::user()->id)->where('status', 'pending')->first(['id']); 
        
        if(empty($status)){

            if($request->amount <= $available->balance){
                WithdrawWallet::create([
                    'user_id' => Auth::user()->id,
                    'amount' => $request->amount
                ]);
                $this->logActivity(Auth::user()->first_name.' You have successfully made a withdraw request, admin will approve it soon. ');
                $this->set_session('You have successfully made a withdraw request, admin will approve it soon.', true);

                return redirect()->route('my_balance');
            }
            else{
                $this->logActivity(Auth::user()->first_name.'Sorry you do not have sufficinet balance to withdraw this amount.');
                $this->set_session('Sorry you do not have sufficinet balance to withdraw this amount.', false);
                return redirect()->route('my_balance');   
            }
        }
        else{
            $this->logActivity(Auth::user()->first_name.'Sorry you already have a withdraw request you can not make another.');
            $this->set_session('Sorry you already have a withdraw request you can not make another.', false);
            return redirect()->route('my_balance');   
        }
    }
}
