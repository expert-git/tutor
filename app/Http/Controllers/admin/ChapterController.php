<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subject;
use App\Grade;
use App\Chapters;

class ChapterController extends Controller
{


public function chapter_list()
{
return view('admin.chapter.chapter_list');
}




	//Chapter index Page
    public function index(){
    	$data['chapters'] = Chapters::select('chapters.id','chapters.chapter_name','grades.grade','subjects.subject')
    	->join('subjects','chapters.subject_id','subjects.id')
    	->join('grades' , 'subjects.grade_id', 'grades.id')
    	->orderBy('chapters.id', 'desc')
    	->get();
    	$data['grades'] = Grade::get();
    	return view('admin.chapter.index')->with($data);
    }

    //edit-subject-viewdata
    public function edit_chapter_data(Request $request){
    	// return($request->input());
    	return Chapters::find($request->input('chapterId'));
    }


    //Add-edit chapter
    public function chapter_submit(Request $request){


    	try{

			if(is_null($request->input('edit_chapter_id')) ) {
				//add subject
				$chapters = new Chapters();
			}else{
				//edit subject
				$chapters = Chapters::find($request->input('edit_chapter_id'));
			}

			$chapters->grade_id = $request->input('grade_id');
			$chapters->subject_id = $request->input('subject_id');
			$chapters->chapter_name = $request->input('chapter_name');

			if($chapters->save()){
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
