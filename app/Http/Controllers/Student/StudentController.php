<?php
namespace App\Http\Controllers\Student;
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
use App\Grade;

class StudentController extends Controller
{
    //Pre test route page for students
    public function pre_test_payment_index(Request $request){

        $data['grades'] = Grade::with('subjects')->get();
        $data['flag'] = $request->segment(count(request()->segments()));

        return view('tests.pretest_payment')->with($data);
    }
}
