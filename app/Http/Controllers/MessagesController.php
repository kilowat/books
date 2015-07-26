<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\UserMessage;
use App\Model\User;

class MessagesController extends Controller
{
	
	public function show(User $user,UserMessage $userMessage){
		$res = [];
		$userList = $userMessage->select('user_send_id')
			->distinct()
			->where('message_type','=','out')
			->orWhere('message_type','=','in')
			->where('user_id','=',\Auth::user()->id)
			->get()
			->lists('user_send_id');



		$userList = $user->whereIn('id',$userList)->get();
		return view('pages.messages.show',compact('userList'));
	}
	
	
	public function send($id,UserMessage $userMessage,User $user){
		$curUserId = \Auth::user()->id;
		
		$userPage = $user->find($id);
		
		$userMsg = $userMessage
					->where('user_id','=',$curUserId)
					->where('user_send_id','=',$id)
					->with('user')
					->with('userSend')
					->get();
		
		$msgCountConf = $userMessage
					->where('confirmed','=',0)
					->where('user_id','=',$curUserId)
					->where('message_type','=','in')
					->count();
		
		return view('pages.messages.send',compact('userPage','userMsg','msgCountConf'));
	}
    //
}
