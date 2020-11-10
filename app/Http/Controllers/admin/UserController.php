<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Role;
use App\User;
use Spatie\Activitylog\Models\Activity;
use App\Status;
use App\Notifications\userNotify;
use App\Events\UserRegistration;
use App\Profile;
use Auth;

class UserController extends Controller
{

    use Notifiable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;

    public function __construct(){
        $this->user = new User();
    }

    public function index()
    {   
        $data['users'] = $this->user->getAllUsers();
        return view('admin.user.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['roles'] = Role::all();
        $data['statuses'] = Status::all();

        return view('admin.user.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $this->validate($request, [
            'first_name' => 'required|string|max:15',
            'last_name' => 'required|string|max:15',
            'email' => 'required|string|email|unique:users',
            'username'=>'required|string|max:15|unique:profiles',
            'password' => 'required|string|min:6',
            'gender' => 'required|string',
            'age' => 'required|numeric',
            'phonenum1' => 'required|numeric',
            'qualifications' => 'required|string|max:15',
            'qualification_from' => 'required|string|max:15'
        ]);

       try{ 
            $this->logActivity('User Added by '. Auth::user()->first_name);

            //Creating new User
            $user = $this->user;
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->phone_no = $request->input('phone_no');
            $user->email = $request->input('email');

            $user->password = bcrypt($request->input('password'));

            $user->status_id = $request->input('status_id');
            // $insert_profile = new Profile();

            if($user->save()){
                //Assigning Role to User
                $role = Role::find($request->input('user_role'));
                $user->roles()->attach($role);
                $data['user'] = $user;
                $data['request'] = $request->all();
                //dd($data);
                event(new UserRegistration($data));
                //Notify Test..
                //$user->notify(new userNotify($user));

                $this->set_session('User Successfully Added.', true);
            }else{
                $this->set_session('User couldnot be added.', false);
            }

            return redirect()->route('users.create');

        }catch(\Exception $e){
            $this->set_session('User Couldnot be Added.'.$e->getMessage(), false);
            return redirect()->route('users.create'); 
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
        $data['user'] = $this->user->getSingleUsers($id);
        return view('admin.user.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['roles'] = Role::all();
        $data['statuses'] = Status::all();
        $data['user'] = User::find($id);
        $data['profile'] = Profile::where('user_id','=',$id)->first();
        
        return view('admin.user.edit')->with($data);
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

            $this->logActivity('User Edited');        
            
            //Creating new User
            $user = $this->user::find($id);
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->phone_no = $request->input('phone_no');
            
            

            $user->email = $request->input('email');

            if(!is_null($request->input('admin-password')) ){
                $user->password = bcrypt($request->input('admin-password'));
            }
            
            $user->status_id = $request->input('status_id');
            $user->verified = $request->input('verified');

            if($user->save()){
                // dd($request->input());
                //Assigning Role to User
                $role = \DB::table('role_user')->where('user_id',$id)->update(['role_id'=>$request->input('user_role')]);
                 $profile =  Profile::where('user_id',$id)->update(['tution_per_hour'=>$request->input('tution_per_hour'),'bio'=>$request->input('bio'),'gender'=>$request->input('gender'),'age'=>$request->input('age'),'qualifications'=>$request->input('qualifications'),'qualification_from'=>$request->input('qualification_from')]);
                 // $profile->save();

                // $profile->username = $request->input('username');
                // $profile->address = $request->input('address');
                // $profile->zipcode = $request->input('zipcode');                        
                // $profile->state = $request->input('state');
                // $profile->country = $request->input('country');
                // $profile->user_id = $user->id;
                //$user->roles()->attach($role);

                $this->set_session('User Successfully Edited.', true);
            }else{
                $this->set_session('User couldnot be edited.', false);
            }

            return redirect()->route('users.edit', ['id'=> $id]);

        }catch(\Exception $e){
            $this->set_session('User Couldnot be Edited.'.$e->getMessage(), false);
            return redirect()->route('users.edit', ['id'=> $id]); 
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
       //Deleting User
       try{

            $this->logActivity('User deleted by'. Auth::user()->first_name);

            $user = $this->user::find($id);
            $user = $user->delete();
            
            if($user){
                $this->set_session('User Deleted.', true);
            }else{
                $this->set_session('User Couldnot be Deleted.', false);
            }

            return redirect()->route('users.index');

        }catch(\Exception $e){
            $this->set_session('User Couldnot be Deleted.'.$e->getMessage(), false);
            return redirect()->route('users.index'); 
        }
    }
}
