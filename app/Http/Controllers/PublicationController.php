<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Publication;
use App\Model\Category;
use App\Http\Requests\PublicationRequest;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Publication $publications)
    {
    	
       return view('pages.publications.index')
       				->with(['publications'=>$publications->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function create(Category $categories){
		
		return view('pages.publications.create')
					->with(['categories'=>$categories->lists('name','id')]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PublicationRequest $request)
    {	
    	$request = $request->all();
    	$request['user_id'] = \Auth::user()->id;
    	
        Publication::create($request);
  
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
