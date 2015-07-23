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
class UserController extends Controller
{
	public $userDisk;

	function __construct(){
		$this->userDisk = Storage::disk('users');
	}
    public function profile(User $user){
		if(\Auth::user()->id === $user->id)
			return view('pages.user.curent_profile',compact('user'));
		else
			return view('pages.user.profile',compact('user'));
	}

	public function edit(User $user){
		$user = $user->where('id','=',\Auth::user()->id)->first();
		$contents = $this->userDisk->get($user->avatar);
		dd($contents);
		return view('pages.user.edit',compact('user'));
	}
	
	public function store(User $user, UserProfileEditRequest $request){
		$user = $user->where('id','=',\Auth::user()->id)->first();
		$file_name = md5(str_random(20));
		$file_ex = $request->file('avatar')->getClientOriginalExtension();
		$avatar_name = $file_name.'.'.$file_ex;

		$input = $request->all();
		$input['avatar'] = $avatar_name;
		$user->update($input);
		$user->save();
		$request->file('avatar')->move(base_path('/upload/users/'.$user->id.'/avatar/origin/'), $file_name.'.'.$file_ex);
		$img = Image::make('/upload/users/'.$user->id.'/avatar/origin/'.$avatar_name)->resize(300, 200);
		$img->save('public/upload/users/'.$user->id.'/avatar/small/'.$avatar_name, 60);
// save file as png with medium quality

		//$request->file('avatar')->move(base_path('/upload'), $file_name.'.'.$file_ex);

		return redirect()->back();
	}
	
	public function usersList(User $users){
		return view('pages.user.list',compact('users'));
	}
}
