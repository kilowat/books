<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\UserMessage;
class MessagesController extends Controller
{
	public function show(){
		
		return view('pages.messages.show');
	}
	
	public function send($id,UserMessage $userMessage){
		$curUser_id = \Auth::user()->id;
		$userMsg = $userMessage
					->where('user_id','=',$curUser_id)
					->get();
		return view('pages.messages.send',compact('id','userMsg'));
	}
    //
}
