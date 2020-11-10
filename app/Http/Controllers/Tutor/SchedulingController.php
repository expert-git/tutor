<?php
namespace App\Http\Controllers\Tutor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Schedule;
use App\User;
use Auth;
use Carbon\Carbon;
class SchedulingController extends Controller
{
    public function create_schedule(Request $request){                
        for ($i = 0; $i < 7; $i++) {
            $day[] = Carbon::now()->addDays($i)->format('Y-m-d');
        }
        $time_array = array();
        $time = "00:00:00";
        for ($i = 0; $i < 24; $i++) {
            $time = date("H:i" ,strtotime($time . " + 1 hour"));
            $time_array[] = $time;
        }
        return view('dashboard.create_schedule',['day'=>$day,'time_array'=>$time_array]);
    }   
    public function post_scheduling(Request $request){
        $time = $request->time . ':00';
        $date = $request->date;
        $status = $request->status;
        $tutor_id = $request->tutor_id;
        try {
            if (isset($request->tutor_id)){              
                $store = Schedule::firstOrNew(array('time' => $time,'date' => $date,'tutor_id' => $tutor_id));
                $store->tutor_id = $tutor_id;
                $store->date = $date;
                $store->time = $time;
                $store->status = $status;
                if ($store->save()){                
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Scheduled This Time Slot']);
                }else{
                    return \Response()->Json([ 'status' => 201,'msg'=>'Something Went Wrong Please Try Again!']);   
                }           
            }else{
                $this->set_session('Please Give The Required Data', false);
                return redirect()->back();
            }
        } catch (QueryException $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }
}