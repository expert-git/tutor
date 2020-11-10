<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job_board;
use App\Booking;
use Auth;
use DB;
use App\Wallet;
use App\Tutor_earning;

class BookingController extends Controller
{
public function booking_view($jobid){
$data['job_board'] = Job_board::where('id', $jobid)->first();
return view('dashboard.booking.index')->with($data);
}

public function student_booklesson(Request $request){

/* Validation */

try{
$booking = new Booking();
$booking->date = $request->input('date');
$booking->location = $request->input('location'); 
$booking->amount = $request->input('amount');
$booking->job_id = $request->input('job_id'); 
$booking->lesson_hours = $request->input('lesson_hours');

//Pending
$booking->status_id = 4;

if($booking->save()){
///$this->set_session('Lesson Successfully Booked.', true);

session()->flash('message', 'Lesson Successfully Booked.');
return redirect()->back();


}else{
/////$this->set_session('Lesson Couldnot be Booked.', false);
session()->flash('message', 'Lesson Couldnot be Booked.');
return redirect()->back();
}

return redirect()->route('booking_index');

}catch(\Exception $e){
$this->set_session('Lesson Couldnot be Booked.'.$e->getMessage(), false);
return redirect()->route('booking_index');
}

}

//Cancel Booking
public function booking_cancel($bookingid){

/* Validation */
try{	
//Check if this Booking belongs to this User (for student)
$booking = Booking::join('job_boards', 'job_boards.id', '=', 'bookings.job_id')
->where('job_boards.student_id', Auth::user()->id)
->exists();
///dd($booking);
if($booking){
//This booking exist for this user
$booking_cancel = Booking::where('id', $bookingid)->update(['status_id'=> 3]);

if($booking_cancel){ 
$this->set_session('Booking Successfully Cancelled.', true);
}else{
$this->set_session('Booking couldnot be Cancelled.', false);
}

}else{
$this->set_session('You dont have access to this Booking.', false);

}

return redirect()->route('bookings_list');

}catch(\Exception $e){
$this->set_session('Booking couldnot be Cancelled.'.$e->getMessage(), false);
return redirect()->route('bookings_list');
}        
}

//Accept/Reject Booking

public function booking_status($bookingid){

/* Validation */

try{
$msg='';
//Check if this Booking belongs to this User (for student)
$booking = Booking::leftjoin('job_boards', 'job_boards.id', '=', 'bookings.job_id')
->leftjoin('job_requests', 'job_requests.job_id', '=', 'job_boards.id')
->where('job_requests.tutor_id', Auth::user()->id)
->first();

// echo $booking['job_id'];

// exit;

//dd($booking->amount);
if($booking['job_id'] > 0){
//This booking exist for this user
//Accept booking
if(\Route::currentRouteName() == 'booking_accept'){	
//Accept
$status = 7;
$msg = 'Accepted';

//Transfer amount from Student wallet to Tutor
$hour_amount = $booking->lesson_hours;	
$total_tamount = $booking->amount;
$service_charge=$total_tamount*(8/100);
if ($hour_amount > 0 && $hour_amount <= 20) {
    $net_amt = $total_tamount-35;
    $amount_to_transfer= $net_amt-$service_charge;
    ///dd($amount_to_transfer);
} else if ($hour_amount >= 21 && $hour_amount <= 50) {
     $net_amt = $total_tamount-30;
     $amount_to_transfer= $net_amt-$service_charge;
   ///dd($amount_to_transfer);   
} else if ($hour_amount >= 51 && $hour_amount <= 200) {
     $net_amt = $total_tamount-25;
     $amount_to_transfer= $net_amt-$service_charge;
  /// dd($amount_to_transfer);   
} else if ($hour_amount >= 201 && $hour_amount <= 400) {
     $net_amt = $total_tamount-20;
     $amount_to_transfer= $net_amt-$service_charge;
   ///dd($amount_to_transfer);   
} 
else if ($hour_amount >= 401) {
     $net_amt = $total_tamount-15;
     $amount_to_transfer= $net_amt-$service_charge;
   ///dd($amount_to_transfer);   
} 


////$amount_to_transfer = $booking->amount;
$student_id = $booking->student_id;
$tutor_id = $booking->tutor_id;


///////////reffer program/////////////////
$countClass='';
$isref=$booking->ref_by;
if($isref!='')
{
$loguser=Auth::user()->id;	
$countClass = DB::table('bookings')
            ->join('job_requests', 'bookings.job_id', '=', 'job_requests.job_id')
            ->where('ref_to', '=', $loguser)
            ->count();
}

if($countClass==5)
{
	$newTutor_balance= DB::table('users')
            ->join('wallets', 'users.id', '=', 'wallets.user_id')
            ->where('users.id', '=', $loguser)
            ->get();
            $array = json_decode($newTutor_balance, true);
            $Ntutor_id= Auth::user()->id;
            $Ntutor_bal= $array[0]['balance'];
            $newTutor_bal=$Ntutor_bal+5;

            DB::table('wallets')
            ->where('user_id', $loguser)
            ->update(['balance' => $newTutor_bal]);
}

///////////////////////////////////////////

//deducting Amount from student
$student_deducted = Wallet::where('user_id', $student_id)->decrement('balance', $total_tamount);

$teacher_increment = Wallet::where('user_id', $tutor_id)->increment('balance', $amount_to_transfer);

//Amount transferred

//Record booking Transaction
$tutor_earning = new Tutor_earning();

$bidd=$booking->id;

// $tutor_earning->booking_id = $booking->id;
// $tutor_earning->save();

//Update jobboard with tutor_id
$update_tutor_status = Job_board::where('id', $booking->job_id)->update(['tutor_id'=> $booking->tutor_id]);

}else if(\Route::currentRouteName() == 'booking_reject'){
//Reject
$status = 8;
$msg = 'Rejected';
}

$booking_cancel = Booking::where('id', $bookingid)->update(['status_id'=> $status]);

if($booking_cancel){
$this->set_session('Booking Successfully '.$msg, true);
}else{
$this->set_session('Booking couldnot be '.$msg, false);
}

}else{
$this->set_session('You dont have access to this Booking.', false);
}

return redirect()->route('bookings_list');

}catch(\Exception $e){
$this->set_session('Booking couldnot be '.$msg.' '.$e->getMessage(), false);
return redirect()->route('bookings_list');
}
}


public function booking_reffer_view($booking_id)
{
	///echo $booking_id;

$users = DB::table('users')
                    ->orderBy('id','ASC')
                     ->where('role_id', 3)
                     ->get();
 /// Session::set('BOOKID', $booking_id);

	return view('dashboard.booking.booking-refer')->with('users', $users);              	
}

public function refer_bookrequest(Request $request)
{

///$bid = $request->get('id');

$refer_by = Auth::user()->id;
$refer_to = $request->input('refer_to');
$book_id = $request->input('book_id');

$getJobid = DB::table('bookings')->where('id', $book_id)->first();
$jid=$getJobid->job_id;
$ref_status=0;

//////////////update////////////////
DB::table('job_requests')
            ->where('job_id', $jid)
            ->update(['tutor_id'=> $refer_to,'ref_by' => $refer_by,'ref_to' => $refer_to]);

////////////delete////////////////////

DB::table('bookings')->where('job_id', $jid)->delete();


///////////////insert//////////////////
$data=array('book_id'=>$book_id,'job_id'=>$jid,'ref_by'=>$refer_by,'ref_to'=>$refer_to,'ref_status'=>$ref_status);
DB::table('tbl_refer')->insert($data);

session()->flash('message', 'Refer Tutor Successfully');
return redirect()->back();
}





public function booking_detail($booking_id){
//Check if this booking belongs to this suer
$data['booking_detail'] = Booking::join('job_boards', 'job_boards.id', '=', 'bookings.job_id')
->leftjoin('job_requests', 'job_requests.job_id', '=', 'job_boards.id')
->join('statuses', 'statuses.id', '=', 'bookings.status_id')
->join('subjects', 'subjects.id', '=', 'job_boards.subject_id')
->join('users', 'users.id', '=', 'job_requests.tutor_id')
->join('lesson_types', 'lesson_types.id', '=', 'job_boards.lesson_type')
->where('bookings.id', $booking_id)
->select('bookings.date', 'bookings.location', 'bookings.amount', 'bookings.lesson_hours', 'bookings.status_id', 'job_boards.*', 'subjects.subject', 'statuses.status', 
'job_requests.tutor_id as tutor_id', 'users.first_name',
'users.email', 'lesson_types.type')
->first();

return view('dashboard.booking.booking-detail')->with($data);               	
}

// //Accept/Reject Booking
// public function booking_reject($bookingid){

//  /* Validation */

//  try{
//  	//Check if this Booking belongs to this User (for student)
//  	$booking = Booking::leftjoin('job_boards', 'job_boards.id', '=', 'bookings.job_id')
//                                   ->leftjoin('job_requests', 'job_requests.job_id', '=', 'job_boards.id')
//                                   ->where('job_requests.tutor_id', Auth::user()->id)
//                                   ->exists();

//      if($booking){
//      	//This booking exist for this user
//      	$booking_cancel = Booking::where('id', $bookingid)->update(['status_id'=> 8]);

//       if($booking_cancel){ 
//       	$this->set_session('Booking Successfully Rejected.', true);
//       }else{
//       	$this->set_session('Booking couldnot be Rejected.', false);
//       }

//      }else{
//      	$this->set_session('You dont have access to this Booking.', false);

//      }

//      return redirect()->route('bookings_list');

//  }catch(\Exception $e){
//         $this->set_session('Booking couldnot be Rejected.'.$e->getMessage(), false);
//         return redirect()->route('bookings_list');
//  }
// }    
}
