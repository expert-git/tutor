<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Job_request;
use DB;
use App\Job_board;
use App\Career_job;
use App\Career_job_application;
use Auth;

class JobController extends Controller
{

    public function __construct(){
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$args['job_requests'] = Job_request::leftJoin('job_boards','job_boards.id','=','job_requests.job_id')->leftJoin('users','users.id','=','job_requests.tutor_id')
                                ->select('job_requests.id','users.first_name','users.last_name','job_requests.description','job_requests.request_status','job_boards.title','job_boards.details')
                                ->get();
    	return view('admin.job_request.index')->with($args);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accept_job_request($id){
        DB::table('job_requests')
            ->where('id', $id)
            ->update(['request_status' => 1]);        
        $this->set_session('Job Request Is Accepted', true); 
        return redirect()->back();
    }
    
    public function reject_job_request($id){
        DB::table('job_requests')
            ->where('id', $id)
            ->update(['request_status' => 0]);         
        $this->set_session('Job Request Is Rejected', false); 
        return redirect()->back();
    }

    public function delete_job_request($id)
    {
       //simple job_request delete
        try{
            $job_request = Job_request::find($id);
            $job_request = $job_request->delete();
            if($job_request){
               $this->set_session('Job Request Successfully Deleted.', true);
            }else{
               $this->set_session('Job Request couldnot be deleted', false);
            }
            return redirect()->route('job_requests');
        }catch(\Exception $e){
            $this->set_session('Subject couldnot be deleted', false);
            return redirect()->route('job_requests');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->logActivity('Page added');
            //Creating new User
            $page = $this->page;
            $page->heading = $request->input('heading');
            $page->content = $request->input('content');
            $page->title = $request->input('title');
            $page->meta = $request->input('meta');
            $page->tags = $request->input('tags');
            if($page->save()){
                $this->set_session('Page Successfully Added.', true);
            }else{
                $this->set_session('Page couldnot be added.', false);
            }
            return redirect()->route('pages.create');
        }catch(\Exception $e){
            $this->set_session('Page Couldnot be Added.'.$e->getMessage(), false);
            return redirect()->route('pages.create'); 
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
        $data['page'] = $this->page->getSinglePage($id);
        return view('admin.page.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page'] = $this->page->getSinglePage($id);
        return view('admin.page.edit')->with($data);
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
       try{

            $this->logActivity('Page edited');

            //Editing Page
            $page = $this->page::find($id);
            
            $page->heading = $request->input('heading');
            $page->content = $request->input('content');

            $page->title = $request->input('title');
            $page->meta = $request->input('meta');
            $page->tags = $request->input('tags');

            if($page->save()){
                $this->set_session('Page Successfully Edited.', true);
            }else{
                $this->set_session('Page couldnot be edited.', false);
            }

            return redirect()->route('pages.edit', ['id'=> $id]);

        }catch(\Exception $e){
            $this->set_session('Page Couldnot be Edited.'.$e->getMessage(), false);
            return redirect()->route('pages.edit', ['id'=> $id]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        //Deleting Page
       
       try{
            $this->logActivity('Page deleted');

            $page = Page::whereId($id);
            $page = $page->delete();
            
            if($page){
                $this->set_session('Page Deleted.', true);
            }else{
                $this->set_session('Page Couldnot be Deleted.', false);
            }

            return redirect()->route('pages.index');

        }catch(\Exception $e){
            $this->set_session('Page Couldnot be Deleted.'.$e->getMessage(), false);
            return redirect()->route('pages.index'); 
        }
    }

    public function job_boards()
    {
        $args['job_boards'] = Job_board::leftJoin('users','users.id','=','job_boards.tutor_id')
                                ->select('job_boards.id','users.first_name','users.last_name','job_boards.request_status','job_boards.title','job_boards.details')
                                ->get();
        return view('admin.job_board.index')->with($args);
    }

    public function delete_job_board($id)
    {
       //simple job_request delete

        try{
            $job_board = Job_board::find($id);
            $job_board = $job_board->delete();
            if($job_board){
               $this->set_session('Job Request Successfully Deleted.', true);
            }else{
               $this->set_session('Job Request couldnot be deleted', false);
            }
            return redirect()->route('job_boards');
        }catch(\Exception $e){
            $this->set_session('Subject couldnot be deleted', false);
            return redirect()->route('job_boards');
        } 
    }

    public function reject_job_board($id){
        DB::table('job_boards')
            ->where('id', $id)
            ->update(['request_status' => 0]);         
        $this->set_session('Job Request Is Rejected', false); 
        return redirect()->back();
    }

    public function accept_job_board($id){
        DB::table('job_boards')
            ->where('id', $id)
            ->update(['request_status' => 1]);        
        $this->set_session('Job Request Is Accepted', true); 
        return redirect()->back();
    }

    //Career Job Functions
    
    //Admin Add job Index
    public function admin_addjob(){
        return view('admin.career.add-job');
    }
    
    //Admin post Job
    public function care_jobs_save(Request $request){
        //return view('admin.career.add-job');
        // /dd($request->input());
        $career_jobs = new Career_job();
        $career_jobs->job_desc = $request->input('job_desc');
        $career_jobs->job_heading = $request->input('job_heading');
        $career_jobs->job_spec = $request->input('job_spec');
        $career_jobs->quaification = $request->input('quaification'); 
        $career_jobs->job_perks = $request->input('job_perks');  
        $career_jobs->job_city = $request->input('job_city');
        $career_jobs->job_apply_date = $request->input('job_apply_date');

        if($career_jobs->save()){
            $this->set_session('Job Successfully Saved', true);
        }else{
            $this->set_session('Job couldnot be Saved', false);
        }

        return redirect()->route('admin_addjob');
    }
    
    public function care_all_jobs(){

        $career_job_applications = Career_job::get();
        
        return view('admin.career.all-career-jobs',['career_job_applications' => $career_job_applications]);
    }

    public function career_job_detail($job_id){
        //dd($job_id . ' under construction');
        $data['single_career_job'] = Career_job::find($job_id);
        //dd($data);
        return view('admin.career.single-career-job')->with($data);
    } 

    public function care_applications_jobs(){
        $data['career_job_applications'] = Career_job_application::leftjoin('career_jobs', 'career_jobs.id', '=', 'career_job_applications.car_job_id')->get();        
        return view('admin.career.all-applications')->with($data);
    }

    public function application_detail($app_id){
        // dd($app_id . ' under construction');
        $details = Career_job::leftjoin('career_job_applications','career_jobs.id','=','career_job_applications.car_job_id')->select('career_jobs.id','career_jobs.job_desc','career_jobs.job_city','career_jobs.job_apply_date','career_jobs.quaification','career_job_applications.resume','career_job_applications.full_name','career_job_applications.gender','career_job_applications.id_num','career_job_applications.contact_num','career_job_applications.shift','career_job_applications.source','career_job_applications.age','career_job_applications.education','career_job_applications.language','career_job_applications.email_address','career_job_applications.location')->where('career_job_applications.car_job_id','=',$app_id)->first();
        // dd($details);
        return view('admin.career.single-application',['details'=> $details]);
    }

    public function career_job_editIndex($jobid){

        $data['single_career_job'] = Career_job::find($jobid);
        return view('admin.career.edit_jobdetail')->with($data);
    }

    public function career_job_editIndex_post(Request $request){

        $career_job_edit = Career_job::find($request->input('edit_job_id'));
        $career_job_edit->job_desc = $request->input('job_desc');
        $career_job_edit->job_heading = $request->input('job_heading');
        $career_job_edit->job_spec = $request->input('job_spec');
        $career_job_edit->quaification = $request->input('quaification'); 
        $career_job_edit->job_perks = $request->input('job_perks');  
        $career_job_edit->job_city = $request->input('job_city');
        $career_job_edit->job_apply_date = $request->input('job_apply_date');

        if($career_job_edit->save()){
            $this->set_session('Job Edited Saved', true);
        }else{
            $this->set_session('Job couldnot be Edited', false);
        }

        return redirect()->route('career_job_editIndex', ['jobid'=> $request->input('edit_job_id')]);        
    }

    public function career_job_delete($jobid){

        if(Auth::user()->role_id == 1){
            //Is Admin 
            $career_app_del = Career_job_application::where('car_job_id', $jobid);
            $career_job_del = Career_job::find($jobid);
            
            $career_app_del = $career_app_del->delete();            
            $career_job_del = $career_job_del->delete();

            if($career_job_del){
                $this->set_session('Job Deleted Successfully', true);
            }else{
                $this->set_session('Job couldnot be Deleted', false);
            }
            
            return redirect()->route('care_all_jobs');  
        }
    }

    public function get_resume($id)
    {
        $get_file = Career_job_application::select('resume')->where('car_job_id','=',$id)->first();
        $file = storage_path('resume/'.$get_file->resume);

        return response()->download($file);
    }
}
