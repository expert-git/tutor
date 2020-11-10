<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use App\Role;
use App\Password_reset;
use DB;
use App\Events\RegisterEvent;
use Session;
use Mail;
use Carbon;
use App\Mail\ForgetPasswordMail;
use App\Mail\EmailVerification;
use Validator;
use App\Events\UserRegistration;
use App\Wallet;
use App\State;
use App\Country;
use App\City;
use App\ReferrerPivotTable;

class AuthenticationController extends Controller
{
    public function login_index(){
        return view('authentication.login');
    }

    public function login_post(Request $request){
     
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

          try{

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password ] )) {
                if(Auth::user()->role_id == 2)
                {
                    $this->logActivity(Auth::user()->first_name.' Logged in on student');
                }
                elseif(Auth::user()->role_id == 3)
                {
                    $this->logActivity(Auth::user()->first_name.' Logged in on tutor');
                }    

               $this->logActivity(Auth::user()->first_name.'Logged in on Tutor');

               DB::table('profiles')
                    ->where('user_id', Auth::user()->id)
                    ->update(['online_status' => 1]);

               //Student Pre-test handling Workz -- 4 July.

               if(Auth::user()->role_id == 2 && Auth::user()->profile->pre_test_paid == 0){
                 return redirect()->route('pre_test_payment_index', ['name' => '1']);
               } 

               return redirect()->route('home');
            }else{
               $this->set_session('invalid username or password', false);
               return redirect()->route('signin');
            }

          }catch(\Exception $e){

           $this->set_session('Something went wrong. Please Try again', false);
           return redirect()->route('signin');
          }   
    }

    //Logging out user
    public function logout_user(){
        $this->logActivity(Auth::user()->first_name.' logged out');
        DB::table('profiles')
            ->where('user_id', Auth::user()->id)
            ->update(['online_status' => 0]);
        Auth::logout();

        return redirect()->route('home');          
    }

    //Register and signup page view
    public function register_index()
    {
        $states = State::all();
        $countries = Country::all();
        // $cities = City::all();
        return view('authentication.signup_faq',['countries'=>$countries, 'states'=>$states]);
    }

    public function stateForCountryAjax(Request $request)
    {
        //return $request->input();
        $country_name = $request->input('countryID');
        $country_id = urldecode($country_name);
        //return $country_id;
        $cities = DB::table('countries')
            ->select('cities.id', 'cities.name','countries.phonecode')
            ->join('states', 'states.country_id', '=', 'countries.id')
            ->join('cities', 'cities.state_id', '=', 'states.id')
            ->where("countries.id", '=',$country_id)
            ->orderBy('cities.name', 'asc')
            ->get();
        return $cities;
    }

    private function _stateCountryIDForCountryName($country_name)
    {
        return DB::table('countries')->where("name","$country_name")->first()->country_id;
    }

    public function register_post(Request $request){
          // dd($request->input());
         /* Validation */



         $this->validate($request, [
            'first_name' => 'required|string|max:15',
            'last_name' => 'required|string|max:15',
            'email' => 'required|string|email|unique:users',
            'username'=>'required|string|max:15|unique:profiles',
            'password' => 'required|string|min:6|confirmed',
            'phonenum1' => 'required|numeric',
            ////'user_ref'=>'string|max:15|unique:users',
            'countryCode' => 'required|numeric'
        ]); 


           try{
            $user = new User();

            //Saving users data on user table
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = bcrypt( $request->input('password') );
            $user->user_ref = $request->input('user_ref');
            $user->ref_by =rand(99,1000);

            $user->role_id = $request->input('role_id');
            $user->email_token = str_random(10);
            $user->verified = 0; 

            $user->phone_no = $request->input('countryCode').$request->input('phonenum1');

            $user->status_id = 1; 
            //$user->pre_test = 0;
           // $user->pre_test_paid = 0;
     
            if($user->save()){
                if($request->input('referrer')){
                    $r = Profile::where('username', $request->input('referrer'))->first();
                    $ref = new ReferrerPivotTable();
                    $ref->user_id = $user->id;
                    $ref->ref_id = $r->user_id;
                    $ref->save();
                }
                
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->first_name, 'email'=> $user->email, 'role_id' => $user->role_id]));
            Mail::to($user->email)->send($email);
            DB::commit();
            Session::flash('message', ' Email has been sent to your account Please on the link to verify your account!');

                // Saving Profle info of user.
                $data['user'] = $user;
                $data['request'] = $request->all();
                //event(new UserRegistration($data));
                //dd($data);
                $profile = new Profile();
                $profile->username = $request->input('username');
                $profile->address = $request->input('address');
                $profile->zipcode = $request->input('zipcode');                        
                $profile->city_id = $request->input('city');
                $profile->country_id = $request->input('country');
                $profile->user_id = $user->id;

                if($request->input('role_id') == 3){
                    //He is a Teacher
                    $this->logActivity('New Teacher '.$request->input('first_name').' Signedup on Tutorareus');

                    $profile->hv_teac = $request->input('hv_teac');
                    $profile->teac_exp = $request->input('teac_exp');

                }else{
                    $this->logActivity('New Student '.$request->input('first_name').' Signedup on Tutorareus');
                }

                $profile->save();
                $w = new Wallet();
                $w->user_id = $user->id;
                $w->save();

                $referral_code=$request->input('user_ref');
                if($referral_code!='')
                {

    $findUser = DB::table('users')
    ->where('ref_by', $referral_code)
    ->first()
    ->id; 

     $findAmount = DB::table('wallets')
    ->where('user_id', $findUser)
    ->first()
    ->balance; 

    $newBalance= $findAmount+10;  

$updateBalance = DB::table('wallets')
            ->where('user_id', $findUser)
            ->update(['balance' => $newBalance]);   
             }


                /*Calling Register user Event */
                // event(new RegisterEvent());

                /*Attaching User Role to the New User */ 
                $user_role = Role::find($request->input('role_id'));
                $user->attachRole($user_role);

                $this->set_session('Verify your account by clickng on link.', true);

            }else{
                 $this->set_session('User Couldnot be Registered.', false);
            }
            
               return redirect()->route('signup');

       }
            catch(\Exception $e){
                $this->set_session('User Couldnot be Registered.'.$e->getMessage(), false);
                return redirect()->route('signup');                
            }
        }

        

 

    public function verify($token)
    {
        // The verified method has been added to the user model and chained here
        // for better readability
        //dd($token)
        $user = User::where('email_token',$token)->first();
         // dd($user);

        if(isset($user)){
            $result = User::where('email_token',$token)->update(['verified'=> 1, 'email_token'=> null]);
            auth()->login($user);
            //$this->suspend = 0;
            //$this->email_token = null;
            //return $this->save();

            //$verify = User::where('email_token',$token)->verified();
            //Redirect Login with Message

        }else{
            //Redirect kisi aur apge with Message\

        }

        //dd($result);
        $this->set_session('you just verified your email', true);
        return redirect()->route('home');
    }

    public function send_forget_email(Request $request){
        // dd($request->input());
        $insert = new Password_reset();
        $insert->email = $request->input('email');
        $insert->token = str_random(60);
        $mytime = Carbon\Carbon::now();
        // dd($mytime->toDateTimeString()); 
        $insert->created_at = $mytime->toDateTimeString();
        $insert->save();
        $user = DB::table('users')->where('email','=',$request->input('email'))->first();
        if(isset($user))
        {
            $email = new ForgetPasswordMail(new Password_reset([ 'email' => $insert->email, 'token'=> $insert->token]));
        
            Mail::to($user->email)->send($email);
            
            DB::commit();
            $this->set_session('your request has been emailed', true);
            return redirect()->back();   
        }
        else{
                $this->set_session('this email does not exist', false);
                return redirect()->back();
        }   
         
    }

    public function set_new_password($token)
    {
        $user = DB::table('password_resets')->where('token','=',$token)->first();
        // dd($user->email);
        return view('authentication.new_password',['user' => $user]);
        // dd($token);
    }    


    public function new_password(Request $request, $email)
    {
        // dd($request->input('new_pass'));
                    // bcrypt($data['password'])
     $this->validate($request, [
            'password' => 'required|string|min:6|confirmed'
        ]); 
   
      
           
            $new_pass = bcrypt($request->input('password'));
            $update_pass =  DB::table('users')
                ->where('email', $email)
                ->update(['password' => $new_pass]);
                if($update_pass)
                {
                    //deleting token row
                    $del_token = DB::table('password_resets')
                ->where('email', $email)
                ->delete();

                    $this->set_session('Your password is updated', true);
                }
                else{
                    $this->set_session('Your password is not updated', false);   
                }

                return redirect()->route('signin');

    }
}
