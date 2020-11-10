<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

	protected $table = 'roles';


	public function getAllRoles(){
		return $this->all();
	}
    public function getSingleRole($id){
        return $this->where('id', $id)
                    ->first();
    }
    	

}