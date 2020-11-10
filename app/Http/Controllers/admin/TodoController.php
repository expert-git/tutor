<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Todo;
use Auth;


class TodoController extends Controller
{

    protected $todo;

    public function __construct(){
        $this->todo = new Todo();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['todos'] = Todo::orderby('sort_no' ,'ASC')->get();
        return view('admin.adminPanelutility.todolist-index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $todo = $this->todo;
        $todo->user_id = Auth::user()->id;
        $todo->task = $request->input('taskName');
        $todo->sort_no = Todo::max('sort_no')+1;
        //sort no in add, desc

        /* 1-Active-undone 2-Done  3-Deleted(not applied) */

        $todo->status = 1;

        if($todo->save()){
            return \Response::json(array('status' => 200, 'msg' => 'Task added'));
        }else{
            return \Response::json(array('status' => 202, 'msg' => 'Task couldnot be added'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return $todo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Custom Todo update
    public function todos_update(Request $request){

         $todo_edit = Todo::find($request->input('taskEditId'));
         $todo_edit->task = $request->input('taskName');

        if($todo_edit->save()){
            return \Response::json(array('status' => 200, 'msg' => 'Task edited'));
        }else{
            return \Response::json(array('status' => 202, 'msg' => 'Task couldnot be edited'));
        }         
    }

    //Custom todo delete
    public function todos_delete(Request $request){

        $todo = Todo::find($request->input('taskId'));
        
        if($todo->delete()){
            return \Response::json(array('status' => 200, 'msg' => 'Task deleted'));
        }else{
            return \Response::json(array('status' => 202, 'msg' => 'Task not deleted'));            
        }
    }

    //Task done undone, change status
    public function task_status(Request $request){

        $todo = Todo::find($request->input('taskId'));
        
        if($request->input('checked')){
            $todo->status = 2; //Done
        }else{
            $todo->status = 1; //undone
        }

        if($todo->save()){
             return \Response::json(array('status' => 200, 'msg' => 'Task marked Done'));
        }else{
             return \Response::json(array('status' => 202, 'msg' => 'Task marked undone'));
        }
    }

    //Task sorting
    public function task_sort(Request $request){

        $todos = Todo::orderby('sort_no' ,'ASC')->get();
        $itemID = $request->input('itemId');
        $itemIndex = $request->input('itemIndex');

        foreach ($todos as $todo) {
            return Todo::where('id', '=',  $itemID)->update(['sort_no' => $itemIndex]);
        }
    }
}
