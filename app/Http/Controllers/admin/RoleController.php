<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Permission;
use DB;

class RoleController extends Controller
{

    protected $role;

    public function __construct(){
        $this->role = new Role();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles'] = $this->role->getAllRoles();
   
        foreach($data['roles'] as $key => $role){
            $data['roles'][$key]['permissions'] = DB::table('permission_role')
                                ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                                ->select('permissions.id', 'permissions.name', 'permission_role.permission_id')
                                ->where('permission_role.role_id', $role->id)->get();
        }

        $data['permissions'] = Permission::all();

        return view('admin.role.index')->with($data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
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

            $this->logActivity('Role Added');

            //Creating new User
            $role = $this->role;
            $role->name = $request->input('name');
            $role->display_name = $request->input('display_name');
            $role->description = $request->input('description');

            if($role->save()){

                $this->set_session('Role Successfully Added.', true);
            }else{
                $this->set_session('Role couldnot be added.', false);
            }

            return redirect()->route('roles.create');

        }catch(\Exception $e){
            $this->set_session('Role Couldnot be Added.'.$e->getMessage(), false);
            return redirect()->route('roles.create'); 
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
        $data['role'] = $this->role->getSingleRole($id);
        return view('admin.role.edit')->with($data);
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

            $this->logActivity('Role updated');

            //Editing Role
            $role = $this->role::find($id);
            
            $role->name = $request->input('name');
            $role->display_name = $request->input('display_name');
            $role->description = $request->input('description');

            if($role->save()){
                $this->set_session('Role Successfully Edited.', true);
            }else{
                $this->set_session('Role couldnot be edited.', false);
            }

            return redirect()->route('roles.edit', ['id'=> $id]);

        }catch(\Exception $e){
            $this->set_session('Role Couldnot be Edited.'.$e->getMessage(), false);
            return redirect()->route('roles.edit', ['id'=> $id]); 
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
        //Deleting Role
       try{

            $this->logActivity('Role deleted');

            $role = Role::whereId($id);
            $role_user = $role->first();

            //Deleting user of this Role
            $role_user_delete = User::join('role_user', 'users.id','=', 'role_user.user_id')->where('role_user.role_id', $role_user->id)->delete();

            //deleting permission role with this role id.
            $permission_role_delete = DB::table('permission_role')->where('role_id', $id)->delete();

            //Delete Role            
            $role_delete = $role->delete();
            
            if($role_delete){
                $this->set_session('Role Deleted.', true);
            }else{
                $this->set_session('Role Couldnot be Deleted.', false);
            }

            return redirect()->route('roles.index');

        }catch(\Exception $e){
            $this->set_session('Role Couldnot be Deleted.'.$e->getMessage(), false);
            return redirect()->route('roles.index'); 
        }
    }
}
