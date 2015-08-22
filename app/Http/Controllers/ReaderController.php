<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

class ReaderController extends Controller
{
    public function getText(){
    	$path = \Auth::user()->id.DIRECTORY_SEPARATOR.'publications'.DIRECTORY_SEPARATOR.'29'.DIRECTORY_SEPARATOR.'page-0.html';
    	$test = Storage::disk('users')->get($path);
		return $test;
	}
}
