<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{

    protected $page;

    public function __construct(){
        $this->page = new Page();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = $this->page->getAllPages();

        return view('admin.page.index')->with($data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
}
