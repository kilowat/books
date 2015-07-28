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
		$msgList = $userMessage->with('userSend','user')
				->where('user_id','=',\Auth::user()->id)
				->orderBy('confirmed','asc')
				->get();
		
		return view('pages.messages.show',compact('msgList'));
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
		return view('pages.messages.send',compact('userPage','userMsg'));
	}
    //
}
