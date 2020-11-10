<?php
//app/Helpers/Envato/User.php
namespace App\Helpers\Envato;
 
use Illuminate\Support\Facades\DB;
use App\User as MUser;
class User {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function get_username($user_id) {
        $user = DB::table('users')->where('id', $user_id)->first();
         
        return (isset($user) ? $user : '');
   	}

   	public static function create_user($data){
   		// dd($data);
   		$user = new MUser;
    	$user->first_name = $data['first_name'];
    	$user->last_name = $data['last_name'];
    	$user->email = $data['email'];
    	$user->password = bcrypt($data['password']);
    	$user->save();
    	return $user;
   	}
}