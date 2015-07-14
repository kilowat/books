<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\UserMessage;
use App\Model\User;
class MessagesController extends Controller
{
	
	public function show(){
		
		return view('pages.messages.show');
	}
	
	public function send($id,UserMessage $userMessage,User $user){
		$curUserId = \Auth::user()->id;
		
		$userPage = $user->find($id);
		
		$userMsg = $userMessage
					->where('user_id','=',$curUserId)
					->get();
		/*
		 * 		
		$userMsg = $userMessage->with(['user'=>function($query,$curUserId){
			$query->where('user_id','=',$curUserId);
		}])->get();
		 */
		dd($userMsg);
		return view('pages.messages.send',compact('userPage','userMsg'));
	}
    //
}
