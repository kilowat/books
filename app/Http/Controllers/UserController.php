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
		
		$user->avatar = '/upload/users/'.$user->id.'/avatar/normal/'.$user->avatar;
		
		return view('pages.user.edit',compact('user'));
	}
	
	public function store(User $user, UserProfileEditRequest $request){
		define('DS', DIRECTORY_SEPARATOR);
		$user = $user->where('id','=',\Auth::user()->id)->first();
		$file_name = md5($user->id);
		$file_ex = $request->file('avatar')->getClientOriginalExtension();
		$avatar_name = $file_name.'.'.$file_ex;

		$input = $request->all();
		$input['avatar'] = $avatar_name;
		$user->update($input);
		$user->save();
		
		$request->file('avatar')->move(public_path('upload'.DS.'users'.DS.$user->id.DS.'avatar'.DS), $file_name.'_origin.'.$file_ex);
		$img = Image::make(public_path('upload'.DS.'users'.DS.$user->id.DS.'avatar'.DS.$file_name.'_origin.'.$file_ex))->resize(300, 200);
		$img->save(public_path('upload'.DS.'users'.DS.$user->id.DS.'avatar'.DS).$file_name.'_normal.'.$file_ex, 60);
// save file as png with medium quality

		

		return redirect()->back();
	}
	
	public function usersList(User $users){
		return view('pages.user.list',compact('users'));
	}
}
