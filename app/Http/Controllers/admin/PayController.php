<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Todo;
use Auth;
use DB;


class PayController extends Controller
{

   
    public function payment_detection($id)
    {  

   $withdrawData = DB::table('withdraw_wallets')
   ->join('wallets', 'withdraw_wallets.user_id', '=', 'wallets.user_id')
                     ->where('withdraw_wallets.id', '=', $id)
                     ->first();
   $withdraw_id=$withdrawData->id;
   $withdraw_amt=$withdrawData->amount;
   $user_id=$withdrawData->user_id;
   $user_amt= $withdrawData->balance; 
   $net_amt=$user_amt-$withdraw_amt; 

   DB::table('withdraw_wallets')
            ->where('id', $id)
            ->update(['status' => 'success']);

   DB::table('wallets')
            ->where('user_id', $user_id)
            ->update(['balance' => $net_amt]);                    
   
        return redirect()->back()->with('message', 'Withdraw accepted successfully.');
    }

    public function destroy_withdraw($id)
    {
       DB::table('withdraw_wallets')->where('id', '=', $id)->delete();
       return redirect()->back()->with('message', 'Withdraw deleted successfully.');
    }

     
}
