<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller
{
    public function profile(User $user){
    	
		if(\Auth::user()->id === $user->id)
			return view('pages.user.curent_profile',compact('user'));
		else
			return view('pages.user.profile',compact('user'));
	}

	public function edit(User $user){
		
		$user = $user->where('id','=',\Auth::user()->id)->first();
		
		return view('pages.user.edit',compact('user'));
	}
	
	public function update(User $user, Request $request){
		
		$user = $user->where('id','=',\Auth::user()->id)->first();
		$request->avatar = 'test.png';
		$input = $request->all();

		$user->update($input);
		$user->save();
		
		$request->file('avatar')->move(base_path('/upload'), 'test.png');
	}
	
	public function usersList(User $users){

		return view('pages.user.list',compact('users'));
	}
}
