<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job_request;
use Auth;
use App\Job_board;
use App\Chat;
use App\Chat_message;
use App\Subject;
use App\Review;
use App\Available_day;
use App\Career_job;
use Illuminate\Support\Facades\Input;
use App\Career_job_application;

class JobController extends Controller
{
    public function student_postJob(){
      $data['subjects'] = Subject::all();
    	return view('dashboard.job.post-job')->with($data);
    }

    public function student_postJob_req(Request $request){

         // dd($request->input());

          /* Validation */

          try{

	    	$job_board = new Job_board();
	    	  
        $job_board->student_id = Auth::user()->id;



             $job_board->request_status = 0;

            foreach($request->input() as $key => $value)
            {
              if($key != '_token' && $key != 'student_id' && $key != 'request_status'){
                   $job_board->$key = $value;
              }
            }


  	        if($job_board->save()){
  	        	$data['request'] = $request->input();
  	        	//event(new Job_request( $data ));

              	$this->set_session('Job Successfully Posted.', true);
  	        }else{
              	$this->set_session('Job Couldnot Posted.', false);
  	        }

  	        return redirect()->route('postjob_view');

          }catch(\Exception $e){
              $this->set_session('Job Couldnot Posted.'.$e->getMessage(), false);
              return redirect()->route('postjob_view');
          }
    }


    //Student posted jobs

    public function student_postJob_list(){

      $data['jobs'] = Job_board::leftjoin('subjects', 'job_boards.subject_id', '=', 'subjects.id')
      							->where('student_id', Auth::user()->id)
      							->select('subjects.subject','job_boards.*')
      							->get();

      return view('dashboard.job.post-job-list')->with($data);
    }

    public function student_postJob_detail($id){
      
      $data['single_job'] = Job_board::leftjoin('subjects', 'job_boards.subject_id', '=', 'subjects.id')
                                ->leftjoin('lesson_types', 'lesson_types.id', '=', 'job_boards.lesson_type')
                                ->where('job_boards.id', $id)
                                ->select('subjects.subject','job_boards.*', 'lesson_types.type')
                                ->first();

      //Getting Tutors responses on this Job
      $data['tutor_responses'] = Job_request::select('job_boards.id as jobboard_id', 'users.first_name' , 
      'profiles.bio', 'profiles.tution_per_hour', 'job_requests.tutor_id', 'job_requests.description',
      'job_requests.job_id', 'profiles.profile_pic', 'bookings.id as booking_id'
      //,'reviews.comment',
      //'reviews.rating','reviews.job_id as current_job_id','reviews.student_id as current_student_id',
      //'reviews.tutor_id as current_tutor_id'
      )
          ->leftjoin('job_boards', 'job_boards.id', '=', 'job_requests.job_id')
           // ->leftjoin('reviews', 'reviews.job_id', '=', 'job_requests.job_id')
          ->leftjoin('users', 'users.id', '=', 'job_requests.tutor_id')
          ->leftjoin('profiles', 'profiles.user_id', '=', 'users.id')
          ->leftjoin('bookings', 'bookings.job_id', '=', 'job_boards.id')
          ->where('job_requests.job_id', $id)
          ->get();
          
     //dd( $data['tutor_responses'] );

      return view('dashboard.job.post-job-detail')->with($data);
    }


    /** Tutor Job Methods **/

    public function post_rating(Request $request){
     try {
      if (isset($request->my_id) && isset($request->job_id) && isset($request->tutor_id) ){        
          $store = new Review;
          $store->tutor_id = $request->tutor_id;
          $store->comment = $request->chat_message;      
          $store->student_id = $request->my_id;      
          $store->job_id = $request->job_id;      
          $store->rating = $request->rate; 
        if ($store->save()){        
          return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Rated And Given Your Review About Teacher Skills']);
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
    public function get_student_jobs(){
      }
    //Request Job By Tutor
    public function request_job(Request $request){

        /* Validation */

        try{
            if(Auth::user()->role_id == 2){
                return \Response::json(array('success' => false, 'msg' => 'Students cannot send Job request'));
            }

            //Check if Tutor has completed required info for Requesting Job ||
            if( is_null(Auth::user()->profile->bio) || is_null(Auth::user()->profile->tution_per_hour) ){
                $text = 'You need to Fill in your BIO and Rates/hour to Send request to Job.';
                return \Response::json(array('success' => false, 'msg' => $text));
            }

            $job_request = new Job_request();
            $job_request->job_id = $request->input('job_id');
            $job_request->description = $request->input('description');
            $job_request->tutor_id = Auth::user()->id;

            if($job_request->save()){

              ///return \Response::json(array('success' => true, 'msg' => 'Job Successfully Requested'));

              session()->flash('message', 'Job Successfully Requested');
               return redirect()->back();

              ///$request->session()->flash('msg', 'Job Successfully Requested');


            }else{


              session()->flash('message', 'Error. Job Couldnot be requested');
               return redirect()->back();

             //// return \Response::json(array('success' => false, 'msg' => 'Error. Job Couldnot be requested'));
            }

        }catch(\Exception $e){
            return \Response::json(array('success' => false, 'msg' => 'Error. Operation failed'.$e->getMessage()));
        }
    }

    //Student reply to tutor on job response
    public function reply_tutor(Request $request){
        //return $request->input();

        //Creating new Chat for this Job Message
        $chat = new Chat();
        $chat->job_id = $request->input('job_id');

        if($chat->save()){
          // new chat creted for this tutor and student

          //Inserting the message into this chat
          $chat_message = new Chat_message();
          $chat_message->from_id = Auth::user()->id;
          $chat_message->chat_id = $chat->id;

          //Get tutor id
          //$job_board = Job_board::where('id', $request->input('job_id'))->first();
          $tutor_id = $request->input('tutor_id');

          $chat_message->to_id = $tutor_id;

          $chat_message->chat_message = $request->input('chat_message');

          if( $chat_message->save() ){
              return \Response::json(array('success' => true, 'msg' => 'Responded to Tutor Successfully'));
          }else{
              return \Response::json(array('success' => false, 'msg' => 'Couldnot respond to this Tutor'));
          }

        }else{
             return \Response::json(array('success' => false, 'msg' => 'Couldnot respond to this Tutor'));
        }

    }

    //Tutor find jobs page
    public function find_tutor_detail(){
    	return view('dashboard.job.findtutoringjob_detail');
    }

    //Availiable job 
    public function avail_job_index(){
      $data['career_jobs'] = Career_job::paginate(5);
      return view('career.availiable_job')->with($data);
    }

    //another function
    public function search_jobs(Request $request){
      $query = $request->input('query');
      $data['career_jobs'] = Career_job::where('job_heading', 'like', "%{$query}%")->paginate(5);
      return view('career.availiable_job')->with($data);
    }

    public function apply_job_index($id){
      $data['career_job'] = Career_job::find($id);
      return view('career.search')->with($data);
    }

    public function apply_job_post(Request $request){
      //dd($request->input());
      /* Validation */

      $career_job_application =new Career_job_application();

      if(Input::hasFile('resume')){
        $file = Input::file('resume');
        $tmpFilePath = storage_path().'/resume/';
        $tmpFileName = time() . '-' . $file->getClientOriginalName();
        $file = $file->move($tmpFilePath, $tmpFileName);
        $path = $tmpFileName;
        //dd($path);
        $career_job_application->resume = $path;
      }

      $career_job_application->car_job_id = $request->input('car_job_id');

      $career_job_application->full_name = $request->input('full_name');

      $career_job_application->gender = $request->input('gender');
      $career_job_application->id_num = $request->input('id_num');
      $career_job_application->contact_num = $request->input('contact_num');

      $career_job_application->shift = $request->input('shift');
      $career_job_application->source = $request->input('source');
      $career_job_application->age = $request->input('age');

      $career_job_application->education = $request->input('education');
      $career_job_application->language = $request->input('language');
      $career_job_application->email_address = $request->input('email_address');       
      $career_job_application->location = $request->input('location');

      if($career_job_application->save()){
        $this->set_session('Applied Successfully', true);
      }else{
          $this->set_session('Couldnot apply to Job', false);
      }

      return redirect()->route('apply_job_index', ['jobid' => $request->input('car_job_id')]);      
    }
}
