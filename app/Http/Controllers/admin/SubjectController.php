<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subject;
use App\Grade;

class SubjectController extends Controller
{


public function add_chapter(Request $request)
{
	
return view('admin.chapter.add_chapter');
}


public function chapter_list()
{
return view('admin.chapter.chapter_list');
}




	//Subject index Page
    public function index(){
    	$data['subjects'] = Subject::leftjoin('grades','subjects.grade_id','=','grades.id')
    	->select('subjects.subject','subjects.subject_code','grades.grade','subjects.id as id')
    	->orderBy('subjects.id', 'desc')
    	->get();
    	$data['grades'] = Grade::get();
    	return view('admin.subject.index')->with($data);
    }

    //edit-subject-viewdata
    public function edit_subj_data(Request $request){
    	// return($request->input());
    	return Subject::find($request->input('subjId'));
    }


    //Add-edit subject
    public function subject_submit(Request $request){


    	try{

			if(is_null($request->input('edit_subj_id')) ) {
				//add subject
				$subject = new Subject();
			}else{
				//edit subject
				$subject = Subject::find($request->input('edit_subj_id'));
			}

			$subject->subject = $request->input('subject');
			$subject->subject_code = $request->input('subject_code');
			$subject->grade_id = $request->input('grade_name');

			if($subject->save()){
				return \Response::json(array('success' => true, 'msg' => 'Success. Operation Completed'));
			}else{
				return \Response::json(array('success' => false, 'msg' => 'Error. Operation failed'));
			}

      	}catch(\Exception $e){
				return \Response::json(array('success' => false, 'msg' => 'Error. Operation failed'.$e->getMessage()));
        }
    }

    //Delete subject
    public function delete_subject($id){
    	//simple subject delete
    	try{
	    	$subject = Subject::find($id);
	    	$subject = $subject->delete();

	    	if($subject){
	           $this->set_session('Subject Successfully Deleted.', true);

	    	}else{
	           $this->set_session('Subject couldnot be deleted', false);
	    	}

	        return redirect()->route('subject_admin');

	   	}catch(\Exception $e){
	   		$this->set_session('Subject couldnot be deleted', false);
			return redirect()->route('subject_admin');
	    }
    }

    public function edit_grade_data(Request $request){
    	// return($request->input('gradeid'));
    	return Grade::find($request->input('gradeid'));
    }

    public function delete_grade($id){

    	//simple subject delete
    	try{
	    	$grade = Grade::find($id);
	    	$grade = $grade->delete();

	    	if($grade){
	           $this->set_session('Grade Successfully Deleted.', true);

	    	}else{
	           $this->set_session('Grade couldnot be deleted', false);
	    	}

	        return redirect()->route('profile_grades');

	   	}catch(\Exception $e){
	   		$this->set_session('Grade couldnot be deleted', false);
			return redirect()->route('Grade_admin');
	    }
    }

    public function grade_submit(Request $request){

    	try{
			if(is_null($request->input('edit_grade_id')) ) {
				//add subject
				$grade = new Grade();
			}else{
				//edit subject
				$grade = Grade::find($request->input('edit_grade_id'));
			}

			$grade->grade = $request->input('grade');
			$grade->grade_description = $request->input('grade_description');

			if($grade->save()){
				return \Response::json(array('success' => true, 'msg' => 'Success. Operation Completed'));
			}else{
				return \Response::json(array('success' => false, 'msg' => 'Error. Operation failed'));
			}

      	}catch(\Exception $e){
				return \Response::json(array('success' => false, 'msg' => 'Error. Operation failed'.$e->getMessage()));
        }
    }
}
