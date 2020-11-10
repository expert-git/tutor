<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job_board;
use App\Lesson_type;
use App\Subject;
use App\Country;
use App\State;
use App\City;
use App\Contact;
use DB;
use App\Subscriber;
use Illuminate\Support\Facades\Input;
use Session;
use Response;
use Mail;
use Auth;
use App\Full_time_email;
use App\Mail\TestMail;
use App\Testimonial;

class HomeController extends Controller
{
	/* Home Page */
    public function index(){

        $data['subjects'] = Subject::all();
        $data['countries'] = Country::all();
        return view('home.index')->with($data);
    }

    //How it works page
    public function how_it_works(){
    	return view('home.howitworks');
    }

    //testimonials page
    public function testimonials(){
      $data['testimonials'] = Testimonial::leftjoin('profiles', 'profiles.user_id', '=', 'testimonials.user')
                                          ->leftjoin('cities', 'cities.id', '=', 'profiles.city_id')
                                          ->leftjoin('countries', 'countries.id', '=', 'profiles.country_id')
                                          ->get();
                                
      return view('home.testimonials')->with($data);
    }

    //faq page
    public function faq(){
      return view('home.faq');
    }
    //referral page
    public function referral(){
      return view('home.referral');
    }

    //Tutor find jobs page

    public function find_tutor(Request $request){

       $data['countries'] = Country::all();

       $data['subjects'] = Subject::all();
       $data['lesson_types'] = Lesson_type::all();

       // / dd($request->input());

       $data['all_jobs'] =  Job_board::leftjoin('users','users.id','=','job_boards.student_id')
               ->leftjoin('profiles','users.id','=','profiles.user_id')
               ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
               ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
               ->leftjoin('job_requests','job_boards.id','=','job_requests.job_id')
               ->select(
                   'job_boards.*',
                   'subjects.subject as sub_name',
                   'subjects.subject_code',
                   'lesson_types.type',
                   'users.first_name',
                   'profiles.country_id',
                   'job_requests.job_id',
                    'users.id as user_id',
                    'users.last_name', 'job_requests.request_status'
               );

         //If course is set
       if(!is_null($request->input('courseform') ) ){
           $data['all_jobs']->where('job_boards.subject_id','=',$request->input('courseform'));
       }

       if(!is_null($request->input('country')))
       {
           $data['all_jobs']->where('profiles.country_id','=',$request->input('country'));
       }

       if(!is_null($request->input('city')))
       {
           $data['all_jobs']->where('profiles.city_id','=',$request->input('city'));

       }

       if(!is_null($request->input('typeform')))
       {
           $data['all_jobs']->where('job_boards.lesson_type','=',$request->input('typeform'));

       }

       $data['all_jobs'] = $data['all_jobs']->paginate(6);

         //If course is set
       if(!is_null($request->input('courseform') ) ){

           $data['all_jobs']->appends(['courseform' => $request->input('courseform') ]);
       }

       if(!is_null($request->input('country')))
       {

           $data['all_jobs']->appends(['country' => $request->input('country') ]);
       }

       if(!is_null($request->input('city')))
       {

           $data['all_jobs']->appends(['city' => $request->input('city') ]);
       }

       if(!is_null($request->input('typeform')))
       {

           $data['all_jobs']->appends(['typeform' => $request->input('typeform') ]);

       }

       //$data['all_jobs']->appends(['courseform' => $request->input('country') ]);

       // if(empty($data['all_jobs'] ))
       // {
           //$this->set_session('no user with this filter exist', false);
       return view('home.findtutoringjob')->with($data);
       //}

    }

    public function filterForCountryAjax(Request $request)
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

    public function filter_jobs(Request $request)
    {
        $data['countries'] = Country::all();
        $data['subjects'] = Subject::all();
        $data['lesson_types'] = Lesson_type::all();

        // / dd($request->input());

        $data['all_jobs'] =  Job_board::leftjoin('users','users.id','=','job_boards.student_id')
                ->leftjoin('profiles','users.id','=','profiles.user_id')
                ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
                ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
                ->leftjoin('job_requests','job_boards.id','=','job_requests.job_id')
                ->select(
                    'job_boards.*',
                    'subjects.subject as sub_name',
                    'subjects.subject_code',
                    'lesson_types.type',
                    'users.first_name',
                    'profiles.country_id',
                    'job_requests.job_id'
                );

          //If course is set
        if(!is_null($request->input('courseform') ) ){
            $data['all_jobs']->where('job_boards.subject_id','=',$request->input('courseform'));
        }

        if(!is_null($request->input('country')))
        {
            $data['all_jobs']->where('profiles.country_id','=',$request->input('country'));
        }

        if(!is_null($request->input('city')))
        {
            $data['all_jobs']->where('profiles.city_id','=',$request->input('city'));

        }

        if(!is_null($request->input('typeform')))
        {
            $data['all_jobs']->where('job_boards.lesson_type','=',$request->input('typeform'));

        }

        $data['all_jobs'] = $data['all_jobs']->paginate(6);

          //If course is set
        if(!is_null($request->input('courseform') ) ){

            $data['all_jobs']->appends(['courseform' => $request->input('courseform') ]);
        }

        if(!is_null($request->input('country')))
        {

            $data['all_jobs']->appends(['country' => $request->input('country') ]);
        }

        if(!is_null($request->input('city')))
        {

            $data['all_jobs']->appends(['city' => $request->input('city') ]);

        }

        if(!is_null($request->input('typeform')))
        {

            $data['all_jobs']->appends(['typeform' => $request->input('typeform') ]);

        }

        //$data['all_jobs']->appends(['courseform' => $request->input('country') ]);

        // if(empty($data['all_jobs'] ))
        // {
            //$this->set_session('no user with this filter exist', false);
        return view('home.findtutoringjob')->with($data);
        //}

        //return view('home.findtutoringjob')->with($data);
    }
        //         if ($request->country_id) {
        //     $states = $states->where('country_id', $request->country_id);
        // }


        // if ($request->state_id) {
        //     $cities = $cities->where('country_id', $request->state_id);
        // }

        //  if ($request->type) {
        //      $args['all_jobs'] = $args['all_jobs']->where('job_boards.lesson_type' , $request->type);
        //  }

        //  if ($request->course) {
        //      $args['all_jobs'] = $args['all_jobs']->where('job_boards.subject_id' , $request->type);
        //  }

        //  if ($request->course) {
        //      $args['all_jobs'] = $args['all_jobs']->where('job_boards.subject_id' , $request->type);
        //  }


    public function home_tutor_filter(Request $request)
    {
        dd($request->input());
    }



     //Tutor profile
    public function tutor_profile(){
    	return view('home.tutor_profile');

    }


    //Fulltime Tutor page
    public function fulltime_tutor(){
    	return view('home.fulltimetutor');
    }

    //Publications page
    public function publications(){
    	return view('home.publication');
    }

    public function forget_password()
    {
        return view('authentication.forget_password');
    }

    // contact page
    public function contactus(){
      return view('home.contact');
    }
    
    public function contactus_post(Request $request){      
      // "full_name" => "dsaad"
      // "email" => "fariha.aimviz@gmail.com"
      // "phone" => "asdad"
      // "subject" => "asd"
      // "your_message" => "asdsad"
      // dd($request);

       try {
                if (isset($request->email)) {
                    $store = new Contact;
                    $store->full_name =$request->full_name;
                    $store->email =$request->email;
                    $store->phone =$request->phone;
                    $store->message_description =$request->message_description;
                    $store->subject_description =$request->subject_description;
                    if ($store->save()){
                        if (isset($store)) {            
                            Mail::send('emails.contact_email',['email_data'=>$store] , function ($message) use($store){
                            //$message->from('info@tutorsareus.org', 'Referel Email - TutorAreUs');
                            $message->from($store['email'], 'Contact Email - Tutor Are Us');
                              ///$message->to(env('MAIL_USERNAME'))->subject('Tutor Are Us - Contact Email');
                             $message->to('support@tutorsareus.org')->subject('Tutor Are Us - Contact Email');
                          });
                        }       
                        // return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Send The Email']);
                        $this->set_session('You Have Successfully Send The Email', true);
                        // dd('You Have Successfully Send The Email');
                        return redirect()->back();

                    }else{                        
                      $this->set_session('Something Went Wrong, Please Try Again', false);
                        return redirect()->back();
                    }
                }else{
                  $this->set_session('Please Provide The Email Address!', false);                  
                  return redirect()->back();
                }
           
        } catch (QueryException $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }


    //terms page
    public function terms(){
      return view('home.terms');
    }
    //terms page
    public function privacy(){
      return view('home.privacy');
    }
    
    //aboutus page
    public function aboutus(){
      return view('home.aboutus');
    }

    public function subscribe(Request $request)
    {
      try {
        if (isset($request->email)){
          $this->validate($request,[
           'email' => 'required|string|unique:users',
         ]);        
          $subscriber = new Subscriber;
          $subscriber->email = Input::get('email');
          if ($subscriber->save()){
             Mail::send('emails.subscribe_email',['subscriber_data'=>$subscriber] , function ($message) use($subscriber){
                  $message->from(env('MAIL_USERNAME'), 'Subscribe Email');
                  $message->to($subscriber->email)->subject('Tutor Are Us');
                   });
            return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Subscribed Email']);
          }else{
            return \Response()->Json([ 'status' => 200,'msg'=>'Something Went Wrong Please Try Again!']);
          }
        }else{
          $this->set_session('Please Give The Required Data', false);
          return redirect()->back();
        }
      } catch (QueryException $e) {
        return \Response()->Json([ 'array' => $e]);
      }
    }

    //401
    public function unauthorized(){
        return view('401');
    }

    //error page
    public function error($message){
        return view('error')->with('message', $message);
    }

    //How it works page
    public function lessons_grade(){
      return view('home.lessons_grade');
    }

    public function full_time_tutor()
    {
      return view('home.full_time_tutor_form');
    }


    public function full_time_email(Request $request)
    {
      // dd($request->input());
      $valueArray = [
          'email' => $request->input('email'),
          'message' => $request->input('message'),
        ];
        $email_info = new Full_time_email;
        $email_info->email = $request->input('email');
        $email_info->message = $request->input('message');
        $email_info->save();
        // Test mail...
        
        try {
           ///Mail::to('hasan.aimviz@gmail.com')->send(new TestMail($valueArray));
             Mail::to('welcome@tutorsareus.org')->send(new TestMail($valueArray));
            echo 'Mail send successfully';
        } catch (\Exception $e) {
            echo 'Error - '.$e;
        }
    }

    public function faqs()
    {
      return view('home.faq'); 
    }

    public function write_testimonial(Request $request)
    {

      try {

        if(Auth::check()){
                     
            if($request->has('testComment')){

              $test_comment = $request->input('testComment');
              $testimonial = new Testimonial();
              $testimonial->user = Auth::user()->id;
              $testimonial->comment = $request->input('testComment');
              
              if($testimonial->save()){
                  return \Response()->Json([ 'status' => 200,'msg'=>'Testimonial Successfully Saved']);
              }else{
                  return \Response()->Json([ 'status' => 202,'msg'=>'Testimonial couldnot be Saved']);
              }

            }else{
                 return \Response()->Json([ 'status' => 202,'msg'=>'Testimonial couldnot be Saved']);
            }

         }else{
              return \Response()->Json([ 'status' => 202,'msg'=>'Please Login to write Testimonials']);
         }

        } catch (Exception $e) {
              return \Response()->Json([ 'status' => 202, 'msg'=>'Testimonial couldnot be Saved'.$ex->getMessage() ]);
        }     

    }
}
