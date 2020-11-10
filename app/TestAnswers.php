<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestAnswers extends Model
{
	
	protected $table = 'tbl_test_ans';
	
	public static function getMarks($data){
	    return TestAnswers::join('mcqs','tbl_test_ans.q_id','mcqs.id')->where('mcqs.test_id',$data['test_id'])->where('mcqs.chapter_id',$data['chapter_id'])->sum('tbl_test_ans.marks');
	}
	
	public static function getQuestionCount($data){
	    return TestAnswers::join('mcqs','tbl_test_ans.q_id','mcqs.id')->where('mcqs.test_id',$data['test_id'])->where('mcqs.chapter_id',$data['chapter_id'])->count();
	}
}
