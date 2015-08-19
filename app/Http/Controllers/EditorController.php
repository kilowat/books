<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
class EditorController extends Controller
{
    public function index($id){
    	$text = '';
    	if(Storage::disk('users')->exists(\Auth::user()->id.DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.'page-1.xml')){
    		$t = new \SimpleXMLElement(Storage::disk('users')->get(\Auth::user()->id.DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.'page-1.xml'));
    		$text = $t->text;
    	}
    	

    	return view('pages.editor.index')->with(['pubId'=>$id,'text'=> $text]);
    }

    public function save(Request $request){
    	$req = $request->all();
    	$text = $request['text'];

    	$pubId = $request['pubId'];
    	$xml = new \XMLWriter();
    	$xml->openMemory(); //использование памяти для вывода строки
		$xml->startDocument(); //установка версии XML в первом теге документа
		$xml->startElement("page"); //создание корневого узла
			$xml->startElement("text");
			$xml->text($text);
			$xml->endElement();
		$xml->endElement(); //закрытие корневого элемента
		Storage::disk('users')->put(\Auth::user()->id.DIRECTORY_SEPARATOR.$pubId.DIRECTORY_SEPARATOR.'page-1.xml', $xml->outputMemory());
    }

    public function page($id,Request $request){
    	$text = '';
    	$request = $request->all();
    	$page = $request['page'];
    	if(Storage::disk('users')->exists(\Auth::user()->id.DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.'page-'.$page.'.xml')){
    		$t = new \SimpleXMLElement(Storage::disk('users')->get(\Auth::user()->id.DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.'page-'.$page.'.xml'));
    		$text = $t->text;
    	
    	}
    	return $text;
    }
}
