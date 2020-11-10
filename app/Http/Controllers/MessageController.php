<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat_message;
use Auth;
use App\User;
use App\Chat;
use App\Profile;
use App\Job_board;

class MessageController extends Controller
{
    public function message_from(Request $request)
    {
    	//return $request->input();
    	//dd($request->input());
    	// dd(Auth::user()->id);
    	$row_to_id = Chat_message::where('chat_id',$request->input('chatId'))->first();
        
        $chat = Chat::where('id', $request->input('chatId'))->first();
        $chat_job_id =  $chat->job_id;

        $job_board = Job_board::where('id', $chat_job_id)->first();

        if(Auth::user()->role_id == 2){
            //student
           $to_id = $job_board->tutor_id;
        }else{
            //teacher
            $to_id = $job_board->student_id;
        }
    	

        //dd($row_to_id);
    	//return $to_id;
    	$msg_form = new Chat_message;
    	$msg_form->chat_id = $request->input('chatId');
    	$msg_form->from_id = Auth::user()->id;
    	$msg_form->to_id = $to_id;
    	$msg_form->chat_message = $request->input('chat_msg');
    	//return (string)$msg_form->save();
    	if($msg_form->save()){
    		return response()->json(array('success' => true, 'chat_id'=>$request->input('chatId'), 'route' =>route('chat_messages') ));

    		return $request->input('chatId');
    	}else{
    		return 0;
    	}
    }

    public function user_list()
    {
    	$user_image = Profile::where('user_id',Auth::user()->id)->first();

        $all_chat_users = Job_board::join('chats', 'chats.job_id', '=', 'job_boards.id')
        ->leftjoin('chat_messages', 'chat_messages.chat_id', '=', 'chats.id');
        
        if(Auth::user()->role_id == 2){

            $all_chat_users = $all_chat_users->leftjoin('users', 'users.id', '=', 'chat_messages.to_id')->where('chat_messages.to_id', '!=' , Auth::user()->id)
            ->where('job_boards.student_id', Auth::user()->id);

        }else if(Auth::user()->role_id == 3){

            $all_chat_users = $all_chat_users->leftjoin('users', 'users.id', '=', 'chat_messages.from_id')
            ->where('chat_messages.from_id', '!=' , Auth::user()->id)
            ->where('job_boards.tutor_id', Auth::user()->id);
        }

        $all_chat_users = $all_chat_users->leftjoin('profiles','users.id','=','profiles.user_id')
        ->distinct('chat_messages.to_id')
        
        
        ->select('users.id as user_id','users.first_name','profiles.profile_pic','chat_messages.chat_id','chat_messages.from_id','chat_messages.to_id')
                        ->get();
		// $all_chat_users = User::leftjoin('profiles','users.id','=','profiles.user_id')
		// 				->join('chat_messages', 'chat_messages.to_id', '=', 'users.id')
		// 				->where('chat_messages.to_id', '!=' , Auth::user()->id)
		// 				->distinct('chat_messages.to_id')
		// 				->select('users.id as user_id','users.first_name','profiles.profile_pic','chat_messages.chat_id','chat_messages.from_id','chat_messages.to_id')
		// 				->get();
					   //dd($all_chat_users);	
	    return view('dashboard.chat_box',['all_chat_users'=>$all_chat_users, 'user_image'=>$user_image]);
    }

    //Load Chat Messages
    public function chat_messages(Request $request){
    	//return $request->input();
    	$chat_messages = Chat::leftjoin('chat_messages', 'chat_messages.chat_id', '=', 'chats.id')
    	->where('chats.id', $request->input('chatId'))
    	->get();

    	//return $chat_messages;
  		$profile = Profile::leftjoin('chat_messages','profiles.user_id','=','chat_messages.to_id');
  		
        if(Auth::user()->role_id == 2){
            $profile = $profile->where('to_id', '!=', Auth::user()->id);
        }else if(Auth::user()->role_id == 3){
             $profile = $profile->where('from_id', '!=', Auth::user()->id);
        }

        

  		 $profile =  $profile->first();


  		//return $profile;
		$returnHTML = view('dashboard.partials.chat-messages')->with('chat_messages',$chat_messages)->with('profile',$profile)->with('chatid', $request->input('chatId'))->render();

		return response()->json(array('success' => true, 'html'=>$returnHTML));

    	//return $chat_messages;
    }
}
