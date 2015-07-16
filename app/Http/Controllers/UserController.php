<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller
{
    public function profile(User $user){

		return view('pages.user.profile',compact('user'));
	}

	public function usersList(User $users){

		return view('pages.user.list',compact('users'));
	}
}
