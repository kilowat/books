<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redis;
class PageController extends Controller
{
     public function index(){

     	$title = 'Главная';

		return view('pages.index',compact('title'));
	}
}
