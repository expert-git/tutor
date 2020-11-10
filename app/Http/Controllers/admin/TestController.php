<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Grade;
use App\Subject;
use App\Chapters;
use App\Test;
use App\Mcq;
use App\Mcq_answer;
use DB;

class TestController extends Controller
{
    public function add_testindex(){
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        
        return view('admin.test.mcq-create')->with($data);
    }


    public function test_listing()
    {
      $gettest_list = DB::table('mcqs')->get();
       return  view('admin.test.mcq-list')->with('gettest_list',$gettest_list);
    }

    public function destroy_admtest($id)
    {
        $dlttest=DB::table('mcqs')->delete($id);
        return redirect()->route('admin_testlist'); 
    }

    //Post test and mcq by admin
    public function admin_addtest(Request $request){
         //dd($request->input());
         /* Validation */
        
         //Check if this grade and subject test is already added. 
         // $test_exist = Test::where('grade_id', $request->input('grade_id'))
         // ->where('subj_id', $request->input('subj_id'))->exists();
         
         // if($test_exist){
         //    $this->set_session('Test is already added for this Grade and Subject.', false);
         //    return redirect()->route('admin_addtest_index');            
         // }

         try{
             //inserting new Test
                $test = new Test();
                $test->subj_id = $request->input('subj_id');
                $test->grade_id = $request->input('grade_id'); 
                $test->heading = $request->input('heading');
                $test->description = $request->input('description'); 
                
                if($test->save()){
                    $test_id =  $test->id;

                    //Inserting multiple Mcqs                    
                    for($i=1; $i<=$request->input('ques_count'); $i++){
                        $mcq = new Mcq();
                        $mcq->test_id = $test_id;
                        $mcq->chapter_id = $request->chapter_id[$i-1];
                        $mcq->question = $request->input('q'.$i)[0];                      

                        if($mcq->save()){
                            $mcq_id = $mcq->id;

                            $options = array_slice($request->input('q'.$i),1);
                            $j=1;
                            $mcqOptions = [];
                            foreach($options as $key => $option){
                                $isCorrect = 0;
                                $optionKey = 'q'.$i.'_check';
                                if($request->$optionKey==$key+1){
                                    $isCorrect = 1;
                                }
                                $mcqOptions[] = ['mcq_id'=>$mcq_id,'mcq_option'=>$option,'correct'=>$isCorrect];
                                $j=$j+1;
                            }
                            Mcq_answer::insert($mcqOptions);  
                        }
                    }

                    $this->set_session('Test mcqs successully Added.', true);
                }else{
                    $this->set_session('Test mcqs couldnot Added.', false);
                }

	    	    return redirect()->route('admin_addtest_index');

	       }catch(\Exception $e){
	            $this->set_session('Test mcqs couldnot Added.'.$e->getMessage(), false);
	            return redirect()->route('admin_addtest_index');
	      }        
    }

    //get grade subjects
    public function get_grade_subjects(Request $request){

        $subjects = Subject::where('grade_id',  $request->input('id'))->get();
        
        $subj_html = '<option value="">Select Subject</option>';
        foreach($subjects as $subject){
            $subj_html .= "<option value='".$subject->id."'>$subject->subject</option>";
        }

        return \Response::json(array('status' => 200, 'html' => $subj_html));
    }
    
    //get subject chapters
    public function get_subject_chapters(Request $request){
        $chapters = Chapters::where('subject_id',  $request->input('id'))->get();
        $chaptersArr = [];
        $chapter_html = '<option value="">Select Chapter</option>';
        foreach($chapters as $chapter){
            $chapter_html .= "<option value='".$chapter->id."'>$chapter->chapter_name</option>";
            $chaptersArr[] = ['id'=>$chapter->id,'chapter_name'=>$chapter->chapter_name];
        }

        return \Response::json(array('status' => 200, 'html' => $chapter_html, 'chapters' => $chaptersArr));
    }


}
