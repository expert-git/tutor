<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawWallet extends Model
{
    //
    protected $fillable = [
    	'user_id', 'amount', 'status'
    ];
}
