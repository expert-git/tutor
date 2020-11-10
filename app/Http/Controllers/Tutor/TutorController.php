<?php
namespace App\Http\Controllers\Tutor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Tutor_subject;
use App\Transaction;
use App\WithdrawWallet;
use App\Subject;
use App\Wallet;
USE App\Tutor_earning;
USE App\Review;
use Auth;
use Mail;
use DB;
use App\Available_day;
use App\Booking;
use Carbon\Carbon;
use App\Schedule;

class TutorController extends Controller
{
    //Search tutor page & Tutor listing in Front Navbar Find A Tutor    
    public function index(Request $request){

     $flag = $request->segment(count(request()->segments())-2);
      //$flag = $request->all();
      //dd('ajay5'); die;
     //dd($flag); die;
     if($flag=='country'){
            $country_id = $request->segment(count(request()->segments()));
            //$country_id = $request['location'];
            //dd($country_id);

            $args['by_country'] = true;

            $args['days'] = Available_day::get();        
            $take = 10;

            $args['listing'] = User::select('users.*', 'profiles.*', 'users.id as user_id', 'users.id as tutor_id')
             //\DB::raw('SUM(reviews.rating) as user_rating'))
            ->leftJoin('profiles','profiles.user_id','=','users.id')
            ->leftJoin('tutor_subjects','tutor_subjects.tutor_id','=','users.id')  
            ->leftjoin('reviews','reviews.tutor_id','=','users.id')      
            ->where('users.verified',1)                                    
            ->where('profiles.country_id', $country_id)
            ->take($take)
            ->get();    
          // dd($args); die;
     }else if($flag=='subject'){
            $subject_id = $request->segment(count(request()->segments()));
            $subject_id =$request['course'];
            $args['by_subj'] = true;
            //dd($subject_id );die;


            $args['days'] = Available_day::get();        
            $take = 10;

            $args['listing'] = User::select('users.*', 'profiles.*', 'users.id as user_id', 'users.id as tutor_id')
             //\DB::raw('SUM(reviews.rating) as user_rating'))
            ->leftJoin('profiles','profiles.user_id','=','users.id')
            ->leftJoin('tutor_subjects','tutor_subjects.tutor_id','=','users.id')  
            //->leftjoin('reviews','reviews.tutor_id','=','users.id')      
            ->where('users.verified',1)                                    
            ->where('tutor_subjects.subject_id', $subject_id)
            ->take($take)
            ->get();
            //dd($args);
     }else{
        //Do as usual
        $args['days'] = Available_day::get();
        
                $take = 10;
                if ($request->name)
                {
                    $words = explode(' ', $request->name);
                    $first_name = $words[0];
                    $last_name = end($words);
                    
                    $args['listing'] = User::select('users.*', 'profiles.*', 'users.id as user_id', 'users.id as tutor_id')->leftJoin('profiles','profiles.user_id','=','users.id')->where('users.role_id',3)
                    ->where('users.verified',1)                                    
                    ->where('users.first_name','LIKE','%'.$first_name.'%')
                    ->orWhere('users.last_name','LIKE','%'.$last_name.'%')
                    ->whereExists(function($query)
                    {
                        $query->select(DB::raw(1))
                        ->from('tutor_subjects')
                        ->whereRaw('tutor_subjects.tutor_id = users.id');
                    })
                    ->take($take)
                    ->get();
                    
                }elseif(isset($request->course) || isset($request->location)){
                    
                    if ($request->home == 1) {
                    
                  
                        $args['listing'] = User::leftJoin('profiles','profiles.user_id','=','users.id')
                        ->leftJoin('tutor_subjects','tutor_subjects.tutor_id','=','users.id')
                        ->where('users.role_id',3)
                        ->where('users.verified',1)                                    
                        ->where('profiles.country_id','=',$request->location)
                        ->where('tutor_subjects.subject_id','=',$request->course)
                        ->whereExists(function($query)
                        {
                            $query->select(DB::raw(1))
                            ->from('tutor_subjects')
                        ->whereRaw('tutor_subjects.tutor_id = users.id');
                       })
                       //->whereExists(function($query1)
                       //{
                         // $query1->select(DB::raw(1))
                     	   //->from('job_boards')
                          //->where('job_boards.lesson_type','=', 1);
                       // })
                        ->take($take)
                        ->get();
                    } 
                    if($request->home == 2) {
                        $args['listing'] = User::leftJoin('profiles','profiles.user_id','=','users.id')
                        ->leftJoin('tutor_subjects','tutor_subjects.tutor_id','=','users.id')
                        ->where('users.role_id',3)
                        ->where('users.verified',1)                                    
                        ->where('profiles.country_id','=',$request->location)
                        ->where('tutor_subjects.subject_id','=',$request->course)
                        ->whereExists(function($query)
                        {
                            $query->select(DB::raw(1))
                            ->from('tutor_subjects')
                            ->whereRaw('tutor_subjects.tutor_id = users.id');
                        })
                       // ->whereExists(function($query)
                       // {
                         //   $query->select(DB::raw(1))
                          //  ->from('job_boards')
                           // ->where('job_boards.lesson_type','=', 2);
                      // })
                        ->take($take)
                        ->get();
                    }
                    if($request->home == 3) {
                   
                        $args['listing'] = User::leftJoin('profiles','profiles.user_id','=','users.id')
                        ->leftJoin('tutor_subjects','tutor_subjects.tutor_id','=','users.id')
                        ->where('users.role_id',3)
                        ->where('users.verified',1)                                    
                        ->where('profiles.country_id','=',$request->location)
                        ->where('tutor_subjects.subject_id','=',$request->course)
                        ->whereExists(function($query)
                        {
                            $query->select(DB::raw(1))
                            ->from('tutor_subjects')
                            ->whereRaw('tutor_subjects.tutor_id = users.id');
                        })
                        //->whereExists(function($query)
                        //{
                          //  $query->select(DB::raw(1))
                            //->from('job_boards')
                            //->where('job_boards.lesson_type','=', 3);
                       // })
                        ->take($take)
                        ->get();
                        
                    }              
                    
                }elseif (isset($request->online_status) || isset($request->address) || isset($request->rating) || isset($request->tution_per_hour) ){
                  
                    $myString = $request->tution_per_hour;
                    $myArray = explode(',', $myString);
        
                    $query = "SELECT `users`.*,`tutor_subjects`.*, `profiles`.*, `users`.id as `user_id`  FROM `users` LEFT JOIN `profiles` ON `users`.`id` = `profiles`.`user_id` LEFT JOIN `tutor_subjects` ON `tutor_subjects`.`tutor_id` = `users`.`id` WHERE `users`.`role_id` = 3 AND `users`.`verified` = 1";
                    $query = $request->online_status ? $query." AND `profiles`.`online_status` = {$request->online_status}" : $query;
                    //$query = $request->rating ? $query." AND `profiles`.`rating` >= {$request->rating}" : $query;
                    $query = $request->address ? $query." AND `profiles`.`address` LIKE '%{$request->address}%'" : $query;
                    $query = $request->tution_per_hour ? $query." AND `profiles`.`tution_per_hour` >=  {$myArray[0]}" : $query;
                    $query = $request->tution_per_hour ? $query." AND `profiles`.`tution_per_hour` <=  {$myArray[1]}" : $query;
                    $query .= " GROUP BY `users`.`id` LIMIT {$take}";
        		//$args['listing'] = $query->get();
                    $args['listing'] = DB::select( DB::raw($query) );
                    
        
        
                }else{
                    $args['listing'] = User::select('users.*', 'profiles.*', 'users.id as user_id', 'users.id as tutor_id')->leftJoin('profiles','profiles.user_id','=','users.id')->where('role_id',3)
                    ->where('verified',1)
                    //->whereExists(function($query)
                    //{
                      //  $query->select(DB::raw(1))
                       // ->from('tutor_subjects')
                        ///->whereRaw('tutor_subjects.tutor_id = users.id');
                   /// })
                    //->limit($take)
                    ->get();
                     //dd($args);
                }
                    
    }

        foreach ($args['listing'] as $key => $tutor_subject) {
            $args['tutor_subjects'][$tutor_subject->user_id] = Tutor_subject::where('tutor_subjects.tutor_id',$tutor_subject->id)->get();
        }    
 
        $args['count'] = count($args['listing']);
        $args['subjects'] = Subject::get();     
        //dd($args);
        return view('home.search')->with($args);
    }
    //Search tutor page & Tutor listing in Front Navbar Find A Tutor By Ajax
    public function tutor_search_ajax(Request $request){
        $take = 10;
        $limit = $request->limit ? $request->limit : 20;
        $skip = $limit - $take;
        if ($request->name) {
            $words = explode(' ', $request->name);
            $first_name = $words[0];
            $last_name = end($words);
            
            $args['listing'] = User::where('role_id',3)
            ->where('verified',1)                                    
            ->where('first_name','LIKE','%'.$first_name.'%')
            ->orWhere('last_name','LIKE','%'.$last_name.'%')
            ->whereExists(function($query)
            {
                $query->select(DB::raw(1))
                ->from('tutor_subjects')
                ->whereRaw('tutor_subjects.tutor_id = users.id');
            })
            ->skip($skip)
            ->take($take)
            ->get();
                            // dd($args['listing']);
            
        }elseif (isset($request->online_status) || isset($request->address) || isset($request->rating) || isset($request->tution_per_hour) ){
            $myString = $request->tution_per_hour;
            $myArray = explode(',', $myString);

            $query = "SELECT * FROM `users` LEFT JOIN `profiles` ON `users`.`id` = `profiles`.`user_id` LEFT JOIN `tutor_subjects` ON `tutor_subjects`.`tutor_id` = `users`.`id` WHERE `users`.`role_id` = 3 AND `users`.`verified` = 1";
            $query = $request->online_status ? $query." AND `profiles`.`online_status` = {$request->online_status}" : $query;
            $query = $request->rating ? $query." AND `profiles`.`rating` >= {$request->rating}" : $query;
            $query = $request->address ? $query." AND `profiles`.`address` LIKE '%{$request->address}%'" : $query;
            $query = $request->tution_per_hour ? $query." AND `profiles`.`tution_per_hour` >=  {$myArray[0]}" : $query;
            $query = $request->tution_per_hour ? $query." AND `profiles`.`tution_per_hour` <=  {$myArray[1]}" : $query;
            $query .= " GROUP BY `users`.`id` LIMIT {$take} OFFSET {$skip}";

            $args['listing'] = DB::select( DB::raw($query) );


        }else{
            $args['listing'] = User::where('role_id',3)
            ->where('verified',1)
            ->whereExists(function($query)
            {
                $query->select(DB::raw(1))
                ->from('tutor_subjects')
                ->whereRaw('tutor_subjects.tutor_id = users.id');
            })
            ->skip($skip)
            ->take($take)
            ->get();
        }
        foreach ($args['listing'] as $key => $tutor_subject) {
            $args['tutor_subjects'][$tutor_subject->id] = Tutor_subject::where('tutor_subjects.tutor_id',$tutor_subject->id)->get();
        }

        $args['count'] = count($args['listing']);
        if($args['count']){
            foreach($args['listing'] as $key => $value){
                $html = '<div class="row f_mainborder">';
                $html .= '<div class="col-md-2">';
                if(isset($value->profile->profile_pic))
                    $html .= "<img src=". asset('public/dashboard/assets/images/profile/'.$value->profile->profile_pic).' class="img-responsive img_searchresp">';
                else
                    $html .= "<img src=". asset('public/dashboard/assets/images/profile/1527579609-1.PNG').' class="img-responsive img_searchresp">';
                $html .= '</div>';
                $html .= '<div class="col-md-7 border_search">';
                $html .= '<h3 class="search_name">'  .$value->first_name." ". $value->last_name.'</h3>';
                $html .= '<h3 class="f_course">';
                foreach($args['tutor_subjects'][$value->id] as $subject){
                    $html .= $subject->subject->subject.', '; 
                }                  
                $html .= '</h3>';
                $html .= '<p class="f_findcontent"> ' ;
                if(isset($value->profile->bio)){
                    $html .= $value->profile->bio;
                }
                $html .= '</p>';
                $html .= '<a href="#" class="f_detail">Read More</a>';
                $html .= '</div>';
                $html .= '<div class="col-md-3">';
                $html .= '<h3 class="search_name">' ;
                if(isset($value->profile->tution_per_hour))
                    $html .= '$'.$value->profile->tution_per_hour.'/hour' ;
                $html .= '</h3>';
                $html .= '<ul class="search_list">';
                $html .= '<li><i class="fa fa-star f_star"></i></li>';
                $html .= '<li><i class="fa fa-star f_star"></i></li>';
                $html .= '<li><i class="fa fa-star f_star"></i></li>';
                $html .= '<li><i class="fa fa-star f_star"></i></li>';
                $html .= '<li><i class="fa fa-star f_star"></i></li>';
                $html .= '<li>';
                $html .= '<h3 class="search_name f_iphone">5.0(367)</h3>';
                $html .= '</li>';
                $html .= '</ul>';
                $html .= '<ul class="search_list">';
                $html .= '<li><i class="fa fa-clock-o f_clock"></i></li>';
                $html .= '<li>';
                $html .= '<h3 class="search_name ">1,722 <span>hours tutoring</span></h3>';
                $html .= '</li>';
                $html .= '</ul>';
                $html .= '</div>';
                $html .= '</div>';
                $status = 200;
            }                  
        }
        else{
            $html = "<h2>Sorry no more results available</h2>";
            $status = 201;
        }
        return \Response()->json(['status' => $status, 'data' => $html, 'msg' => 'check console']);
    }
    //Tutor profile
    public function tutor_profile($name){

        if(is_numeric($name)){
            $id = $name;
        }else{
            //Get id from username
            $profile = Profile::where('username', $name)->first();
            $id = $profile->user_id;
        }

        
        for ($i = 0; $i < 7; $i++) {
            $day[] = Carbon::now()->addDays($i)->format('Y-m-d');
        }

        $time_array = array();
        $time = "00:00:00";
        for ($i = 0; $i < 24; $i++) {
            $time = date("H:i" ,strtotime($time . " + 1 hour"));
            $time_array[] = $time;
        }
        $args['tutor_info'] = User::find($id); 
        $args['tutor_subjects'] = Tutor_subject::where('tutor_id',$id)->get();
        $subjects =array();
        foreach($args['tutor_subjects'] as $value){
            $subjects[] = $value->subject_id;
        }
        $args['recommended_users']  = User::leftJoin('tutor_subjects','tutor_subjects.tutor_id','=','users.id')
                                        ->select('users.first_name','users.last_name', 'users.id as user_id', 'profiles.username')
                                        ->leftJoin('profiles','profiles.user_id','=','users.id')
                                        ->whereIn('tutor_subjects.subject_id',$subjects)
                                        ->where('users.id','!=',$id)->groupBy('users.id')->get();

        $from = date('Y-m-d');
        $to = date( "Y-m-d", strtotime( "$from +7 day" ) );
        
        $args['tutor_schedule'] = Schedule::where('tutor_id','=',$id)
        ->where('status',1)
        ->whereBetween('date', array($from, $to))
        ->orderBy('date','ASC')
        ->orderBy('time','ASC')                        
        ->limit(7)
        ->get();
        
        $args['tutor_schedule_time'] = Schedule::where('tutor_id','=',$id)
        ->groupBy('date')
        ->whereBetween('date', array($from, $to))
        ->where('status',1)
        ->orderBy('date','ASC')
        ->get();

        foreach ($args['tutor_schedule_time']  as $key => $value) {
            $args['tutor_schedule_date'][$value->id] = Schedule::where('tutor_id','=',$id)
            ->where('date','=',$value->date)
            ->where('status',1)
            ->whereBetween('date', array($from, $to))
            ->orderBy('time','ASC')
            ->get();
        }
        $args['reviews_ratings'] = Review::leftJoin('users','users.id','=','reviews.student_id')
        ->where('tutor_id',$id)
        ->get();
        
        $args['five_star'] = 0;
        $args['four_star'] = 0;
        $args['three_star'] = 0;
        $args['two_star'] = 0;
        $args['one_star'] = 0;                                       
        foreach ($args['reviews_ratings'] as $key => $value) {
            if ($value->rating == 5) {
                $args['five_star'] += 1;
            }
            if ($value->rating == 4) {
                $args['four_star'] += 1;
            }
            if ($value->rating == 3) {
                $args['three_star'] += 1;
            }
            if ($value->rating == 2) {
                $args['two_star'] += 1;
            }
            if ($value->rating == 1) {
                $args['one_star'] += 1;
            }
        }      
        $args['reviews_ratings_count'] =  $args['reviews_ratings']->count();        
        $args['rating'] = 0;
        foreach ($args['reviews_ratings'] as $key => $value) {
            $args['rating'] += $value->rating;
        }
        //$args['reviews_ratings_count'] = 1;
        //dd();
        if($args['reviews_ratings_count']  != 0 )
        {

            $args['five_star_width'] = ($args['five_star'] / $args['reviews_ratings_count'] * 100);
            $args['five_star_width'] = (int) $args['five_star_width'];

            $args['four_star_width'] = ($args['four_star'] / $args['reviews_ratings_count'] * 100);
            $args['four_star_width'] = (int) $args['four_star_width'];

            $args['three_star_width'] = ($args['three_star'] / $args['reviews_ratings_count'] * 100);
            $args['three_star_width'] = (int) $args['three_star_width'];

            $args['two_star_width'] = ($args['two_star'] / $args['reviews_ratings_count'] * 100);
            $args['two_star_width'] = (int) $args['two_star_width'];
            
            $args['one_star_width'] = ($args['one_star'] / $args['reviews_ratings_count'] * 100);
            $args['one_star_width'] = (int) $args['one_star_width'];
            
            $args['rating_round_off'] = round($args['rating']/$args['reviews_ratings_count']);
            DB::table('profiles')
            ->where('user_id', $id)
            ->update(['rating' => $args['rating_round_off']]);      
        }
        return view('home.tutor_profile',['day'=>$day,'time_array'=>$time_array])->with($args);
    }
    public function contact_tutor_email(Request $request){
        $email_data['name'] = $request->tutor_name;        
        $email_data['email'] = $request->tutor_email;
        $email_data['description'] = $request->description;
        if (isset($email_data)) {            
           Mail::send('emails.contact_tutor',['email_data'=>$email_data] , function ($message) use($email_data){
              $message->from($email_data['email'], 'Contact Email - TutorAreUs');
              $message->to(env('MAIL_USERNAME'))->subject('TutorAreUs - Contact Email');
          });
       }
       $this->set_session('You Have Successfully Send An Email', true);
       return redirect()->back();
   }
   public function tutor_earnings(){
    $data['tutor_earnings'] = Tutor_earning::join('bookings', 'tutor_earnings.booking_id', '=', 'bookings.id')
    ->leftjoin('job_boards', 'job_boards.id', '=', 'bookings.job_id')
    ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
    ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
    ->leftjoin('users','job_boards.student_id','=','users.id')
    ->select('tutor_earnings.booking_id','bookings.date','bookings.location','bookings.amount','bookings.lesson_hours','job_boards.title','job_boards.details','job_boards.student_id','users.first_name','job_boards.tutor_id','subjects.subject','lesson_types.type')
    ->where('job_boards.tutor_id', Auth::user()->id)
    ->get();


    return view('dashboard.tutor.tutor-earning')->with($data);
}

public function tutor_earnings_details($booking_id)
{
    $data['tutor_earning_detail'] = Tutor_earning::join('bookings', 'tutor_earnings.booking_id', '=', 'bookings.id')
    ->leftjoin('job_boards', 'job_boards.id', '=', 'bookings.job_id')
    ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
    ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
    ->leftjoin('users','job_boards.student_id','=','users.id')
    ->join('statuses', 'statuses.id', '=', 'bookings.status_id')
    ->select('job_boards.*','bookings.date','bookings.location',
        'bookings.amount','bookings.lesson_hours', 'users.first_name',
        'subjects.subject','lesson_types.type', 'statuses.status')
    ->where('bookings.id', $booking_id)
    ->first();

    	// $data['booking_detail'] = Booking::join('job_boards', 'job_boards.id', '=', 'bookings.job_id')
        // ->leftjoin('job_requests', 'job_requests.job_id', '=', 'job_boards.id')
        // ->join('statuses', 'statuses.id', '=', 'bookings.status_id')
        // ->join('subjects', 'subjects.id', '=', 'job_boards.subject_id')
        // ->join('users', 'users.id', '=', 'job_requests.tutor_id')
        // ->join('lesson_types', 'lesson_types.id', '=', 'job_boards.lesson_type')
        // ->where('bookings.id', $booking_id)
        // ->select('bookings.date', 'bookings.location', 'bookings.amount', 'bookings.lesson_hours', 'bookings.status_id', 'job_boards.*', 'subjects.subject', 'statuses.status', 
        //       'job_requests.tutor_id as tutor_id', 'users.first_name',
        //        'users.email', 'lesson_types.type')
        //   ->first();

        //dd($data['tutor_earning_detail']);
    return view('dashboard.tutor.tutor-earning-details')->with($data);

}
}