<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;
use Hash;
use DB;
use App\Tutor_subject;
use App\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteFriend;
class DashboardController extends Controller
{

   	public function __construct()
    {

    }

    public function index(){

      if(Auth::user()->role_id == 1){
        return redirect()->route('admin-index');
      }

    	$data['user'] = User::join('profiles', 'profiles.user_id', '=', 'users.id')
                      ->leftjoin('countries','profiles.country_id','=','countries.id')
                      ->leftjoin('cities','profiles.city_id','=','cities.id')
                      ->select('users.*','profiles.*','countries.name as country_name','cities.name as city_name')
                      ->where('users.id', Auth::user()->id)->first();
                      // dd($data['user']);
    	return view('dashboard.index')->with($data);
    }

    //Change existing password view
    public function edit_pass_view($id){
        $user_id = $id;
      return view('dashboard.settings.editpassword',['user_id' => $id]);
    }

    //Change existing password post
    public function edit_pass_post(Request $request){
      dd($request->input());
    }

    public function change_newpassword(Request $request, $id)
    {
       //    dd($request->input());
       // /* Validation */


         try{

        if (Hash::check($request->input('current_password'), Auth::user()->password))
        {
         // The passwords match...

             $this->validate($request, [
                 'password' => 'required|confirmed|min:6|max:18',
             ]);

        //Updating Password
        $newpassword1 = bcrypt($request->input('password'));

        $user = User::find(Auth::user()->id);
        // dd($user);
        $user->password = $newpassword1;
        $password_updated = $user->save();

        if($password_updated)
        {
            $this->logActivity(Auth::user()->first_name.' update password ');
            $this->set_session('Password Updated', true);
        }else{
            $this->set_session('Password couldnot be Updated. Please try again.', false);
        }

        }else{
        //old password doesn't match
               $this->set_session('Please enter Correct Previous Password to change your Password.', false);
        }

           return redirect()->back();

         }catch(\Exception $e){
                   $this->set_session('Password couldnot be Updated. '.$e->getMessage(), false);
                   return redirect()->back();
             }

    }

    public function subjects()
    {
        $subjects_name = DB::table('subjects')->get();
        $all_subjects = Tutor_subject::join('subjects','subjects.id','=','tutor_subjects.subject_id')->select('subjects.*','tutor_subjects.id as tutor_subject_id')->where('tutor_id', Auth::user()->id)->get();

        return view('dashboard.subjects',['subjects' => $subjects_name, 'all_subjects'=>$all_subjects]);
    }

    public function tutor_subject(Request $request)
    {
        // dd($request->input());
        try{
          $count_subjects = Tutor_subject::where('tutor_id',Auth::user()->id)->get();
          // dd(count($count_subjects));
          if(count($count_subjects) < 5)
          {

            $subjects_name = DB::table('subjects')->get();
            $insert_subject = new Tutor_subject();
            $insert_subject->subject_id = $request->input('subject_name');
            $insert_subject->tutor_id = Auth::user()->id ;
            $insert_subject->save();
            if($insert_subject->save())
            {
                  $this->logActivity(Auth::user()->first_name.' added subjects to his account');

                    $all_subjects = Tutor_subject::join('subjects','subjects.id','=','tutor_subjects.subject_id')->select('subjects.*','tutor_subjects.id as tutor_subject_id')->where('tutor_id',$insert_subject->tutor_id)->orderby('tutor_subjects.id','asc')->get();

                // dd($all_subjects);
                return view('dashboard.subjects',['all_subjects' => $all_subjects, 'user_id'=>$request->input('user_id'),'subjects' => $subjects_name]);
            }

          }
          else{
                $subjects_name = DB::table('subjects')->get();
                $all_subjects = Tutor_subject::join('subjects','subjects.id','=','tutor_subjects.subject_id')->select('subjects.*','tutor_subjects.id as tutor_subject_id')->where('tutor_id',Auth::user()->id)->orderby('tutor_subjects.id','asc')->get();
                // dd(77);
                 // dd(2222);
                $this->set_session('you can only add 5 subjects', false);
                return view('dashboard.subjects',['all_subjects' => $all_subjects, 'user_id'=>$request->input('user_id'),'subjects' => $subjects_name]);

          }

        }catch(\Exception $e){
           $this->set_session($e->getCode(), false);
           if($e->getCode()==23000){
                //subject already exists
            $this->set_session('You have already added this subject', false);
           }
           //die();
           return redirect()->route('subjects');
        }

    }

    //Remove subject
    public function subjDel($subjectid=null){

      try{
        if(!is_null($subjectid)){

             $delSub = DB::table('tutor_subjects')->where('tutor_id', Auth::user()->id)
              ->where('subject_id', $subjectid)->delete();

             if($delSub){
               $this->set_session('Subject Succesfully Deleted', true);
             }else{
               $this->set_session('Subject couldnot be deleted', false);
             }

             return redirect()->route('subjects');
         }
      }catch(\Exception $e){
           $this->set_session('Subject couldnot be deleted'.$e->getMessage(), false);
           return redirect()->route('subjects');
      }
    }

    //All Bookings
    public function bookings_list(){
            //dd($data['bookings'][0]->date);
      if(Auth::user()->role_id == 2){
          //student bookings
          $data['bookings'] = Booking::leftjoin('job_boards', 'job_boards.id', '=', 'bookings.job_id')
                                      ->select('bookings.id as id', 'bookings.date', 'bookings.location', 'bookings.amount', 'bookings.status_id')
                                      ->where('job_boards.student_id', Auth::user()->id)
                                      ->get();

      }else if(Auth::user()->role_id == 3){
        //Tutors bookings
          $data['bookings'] = Booking::leftjoin('job_boards', 'job_boards.id', '=', 'bookings.job_id')
                                      ->leftjoin('job_requests', 'job_requests.job_id', '=', 'job_boards.id')
                                      ->select('bookings.id as id', 'bookings.date', 'bookings.location', 'bookings.amount', 'bookings.status_id')
                                      ->where('job_requests.tutor_id', Auth::user()->id)
                                      ->get();

      }
      //dd($data['bookings']);

      return view('dashboard.booking.booking-list')->with($data);
    }

    public function invite_friend()
    {
      return view('dashboard.invite_friend');
    }
    public function invite_request(Request $request)
    {
     $referel_email = $request->email;
      $this->validate($request, [
            'email' => 'required'
        ]);

        Mail::send('emails.invite_mail',['email'=>$referel_email] , function ($message) use($referel_email){
              $message->from('info@tutorsareus.org', 'Referel Email - TutorAreUs');
              $message->to($referel_email)->subject('TutorAreUs - Referel Email');
          });

      // Mail::to($request->input('email'))->send(new InviteFriend());
      return redirect()->back()->with('success', 'Email sent successfully. Check your email.');
    }

public function my_result()
{
 $uid=Auth::user()->id;

// $data = DB::table('tbl_test_ans')
//     ->join('tests', 'tbl_test_ans.test_id', '=', 'tests.id')
//     ->where('tbl_test_ans.u_id', '=', $uid)
//     ->sum('tbl_test_ans.marks');
//    return view('dashboard.result.my-result')->with('data',$data);

///$data = DB::table('tbl_test_ans')->get();

$data = DB::table('tbl_test_ans')
                ->join('mcqs', 'tbl_test_ans.test_id', '=', 'mcqs.test_id')
                ->join('tests', 'tbl_test_ans.test_id', '=', 'tests.id')
                ->join('subjects', 'tests.subj_id', '=', 'subjects.id')
                ->join('grades', 'tests.grade_id', '=', 'grades.id')
                ->join('chapters', 'mcqs.chapter_id', '=', 'chapters.id')
                ->select('tests.heading','subjects.subject','grades.grade','chapters.chapter_name', 'mcqs.test_id','tests.subj_id','tests.grade_id','mcqs.chapter_id','tbl_test_ans.q_id')
                ->groupBy('mcqs.chapter_id')
                ->where('tbl_test_ans.u_id',$uid)
                ->get();

   return view('dashboard.result.my-result')->with('data',$data);
}


public function ContactAdmin()
{
	///echo "hiii";
	return view('dashboard.contact_admin');
}


}
