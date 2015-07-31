<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\UserMessage;
use App\Model\User;

class MessagesController extends Controller
{
	public $current_user;
	
	public function __construct(){
		$this->current_user = \Auth::user();
	}
	
	public function show(User $user,UserMessage $userMessage){
		$msgList = $userMessage->lastMessages($this->current_user->id);
		return view('pages.messages.show',compact('msgList'))->with(['current_user'=>$this->current_user]);
	}
	
	
	public function send($id,UserMessage $userMessage,User $user){
		$curUserId = $this->current_user->id;
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
