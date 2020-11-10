<?php
namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Test;
use App\Grade;
use App\Mcq;
use App\Mcq_answer;
use App\TestAnswers;
use Auth;

class TestController extends Controller
{
    protected $grades;
    protected $data;

    public function __construct(){
        //Eager Loading
        $this->data['grades'] = Grade::with('subjects')->get();
        $this->data['option_attr'] = array(
                                            '0' => 'A',
                                            '1' => 'B',
                                            '2' => 'C',
                                            '3' => 'D'
                                        );
    }

    public function lessons_grade(){
        //Random Test
        $this->data['test_mcq'] = Test::with('mcqs')->where(['grade_id' => 1, 'subj_id'=> 3])
        ->first();

        //dd(count($this->data['test_mcq']));

        return view('tests.lessons_grade')->with($this->data);
    }

    public function test_mcq_index($grade_id , $subject_id){

        $this->data['test_mcq'] = Test::with('mcqs')->where(['grade_id' => $grade_id, 'subj_id'=> $subject_id])
                                              ->first();
        //dd($this->data['test_mcqs']);
        return view('tests.lessons_grade')->with($this->data);        
    }

    //Check test mcq answer post request
    public function check_answer(Request $request){
        //return $request->input();
        try{
            $mcq_answer = Mcq_answer::where(['mcq_id' => $request->input('mcq_id'), 'mcq_option' => $request->input('choice')])
                        ->first();
            $correct_answer = $mcq_answer->correct;

            //getting wrong answer that user clicked
            $wrong_ans = $mcq_answer->mcq_option;

            if($correct_answer){
                return \Response()->json(['msg' => "Correct Answer", 'status' => 200, 
                'ans' => $correct_answer, 'ans_text'=> $mcq_answer->mcq_option, 'wr_text' => $wrong_ans]);

            }else{

                $right_answer = Mcq_answer::where(['mcq_id' => $request->input('mcq_id'), 'correct' => 1])
                ->first();

                //getting wrong answer that user clicked
                $wrong_ans = $mcq_answer->mcq_option;
                                            
                $right_answer = $right_answer->mcq_option;
                return \Response()->json(['msg' => "Correct Answer", 'status' => 200, 'ans' => $correct_answer, 
                'ans_text'=> $right_answer, 'wr_text' => $wrong_ans]);
            }
            //do something


        }catch(\Exception $e){
            return \Response()->json(['msg' => "Something went wrong", 'status' => 422]);
        }
    }

    //Student pretest Routes
    public function student_pretest(){

        //Check if Student
       if(Auth::user()->role_id != 2){
          $this->set_session('Only Students can access this link', false);
          return redirect()->route('home');
       } 

        //Payment Check to give Pre-test by student
       if(Auth::user()->profile->pre_test_paid == 0){
        return redirect()->route('pre_test_payment_index', ['name' => '1']);
       } 

        //Random Test
        $this->data['test_mcq'] = Test::with('mcqs')->where(['grade_id' => 1, 'subj_id'=> 3])
        ->first();

        //dd(count($this->data['test_mcq']));

        return view('tests.pretest')->with($this->data);        
    }


public function submit_test(Request $request)
{
    $resultData = [];
  foreach($request->mcq_id as $question_id){
     $correctOptionData =  Mcq_answer::select('id')->where('mcq_id',$question_id)->where('correct',1)->first();
     $key = 'choice_'.$question_id;
     $test_id= $request->test_id;
     $answerOptionId = $request->$key;
     if(!empty($correctOptionData) && $correctOptionData->id == $answerOptionId){
         // correct answer
         $marks = 1;
     }
     else{
         // incorrect answer
         $marks = 0;
     }
     $resultData[] = ['u_id'=>Auth::user()->id,'test_id'=>$test_id,'q_id'=>$question_id,'marks'=>$marks];     
  }


$response = TestAnswers::insert($resultData);
if($response){
        return redirect('my_result');
}



}













}
