<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Http\Requests\UserProfileEditRequest;
use App\Http\Controllers\Controller;
use App\Model\User;
use Storage;
use Image;
use Auth;

class UserController extends Controller
{

	
	function __construct(){
		$this->userDisk = Storage::disk('users');

	}
    public function profile(User $user){
    	
		if(Auth::user()->id === $user->id)
			return view('pages.user.curent_profile',compact('user'));
		else
			return view('pages.user.profile',compact('user'));
	}

	public function edit(){
		return view('pages.user.edit')->with(['user'=>Auth::user()]);
	}
	
	public function store(User $user,UserProfileEditRequest $request){
		$this->dispatch(new \App\Jobs\SaveUserData(Auth::user(),$request));
		return redirect()->back();

	}
	
	public function usersList(User $users){
		$users = $users->all();
		return view('pages.user.list',compact('users'));
	}
}
