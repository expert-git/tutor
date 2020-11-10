<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Review;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_token','verified', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
      return $this->hasOne('App\Profile');
    }

    public function tutor_subject(){
        return $this->hasMany('App\Tutor_subject','tutor_id');
    }
    public function todo(){
        return $this->hasMany('App\Todo');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function getAllUsers(){
        
        return $this->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                     ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
                     ->leftjoin('statuses', 'statuses.id', '=', 'users.status_id')
                     ->select('users.id', 'users.first_name', 'users.email', 'users.verified', 'roles.display_name', 'statuses.status')
                     ->get();
    }

    public function getSingleUsers($id){
        return $this->join('role_user', 'role_user.user_id', '=', 'users.id')
                    ->join('profiles','users.id','=','profiles.user_id')
                     ->join('roles', 'roles.id', '=', 'role_user.role_id')
                     ->leftjoin('statuses', 'statuses.id', '=', 'users.status_id')
                     ->select('users.id', 'users.status_id', 'roles.id as role_id', 'users.first_name', 'users.last_name', 'users.phone_no', 'users.email', 'users.verified', 'roles.display_name', 'users.password', 'statuses.status','profiles.username','profiles.bio','profiles.tution_per_hour','profiles.gender','profiles.age')
                     ->where('users.id', $id)
                     ->first();
    }

    public function getSingleUserDetail($id){
        return $this->join('role_user', 'role_user.user_id', '=', 'users.id')
                     ->join('roles', 'roles.id', '=', 'role_user.role_id')
                     ->leftjoin('statuses', 'statuses.id', '=', 'users.status_id')
                     ->select('users.id', 'roles.id as role_id', 'users.first_name', 'users.email', 'roles.display_name', 'users.password', 'statuses.status', 'users.verified')
                     ->where('users.id', $id)
                     ->first();        
    }

    public static function getTutorRating($userid){
        //dd($userid);
        $rating_count = Review::where('tutor_id', $userid)->count();
        
        if($rating_count == 0){
            return 0;
        }else{
            $rating_sum = Review::where('tutor_id', $userid)->sum('rating');
            return round($rating_sum/$rating_count);
        }
    }

}
