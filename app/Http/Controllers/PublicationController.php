<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Publication;
use App\Model\Category;
use App\Http\Requests\PublicationRequest;
use App\Lib\Menu;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
	public function __construct()
	{
		Menu::add(['top']);
	}
	
    public function index(Publication $publications)
    {
       return view('pages.publications.user_index')
       				->with(['publications'=>$publications->paginate(15)]);
    }
    
    public function category($slug,Category $categories,Publication $publication)
    {
    	$category = $categories->where('slug','=',$slug)
    				  ->first();
    	
    	$publications = $publication->where('category_id','=',$category->id)
    						->with('user')
    						->paginate(6);
 		
    	return view('pages.publications.category',compact('publications','category'));
    }
    
    public function all(Publication $publication)
    {
    	$publications = $publication
    					->with('user')
    					->with('category')
    					->paginate(6);

    	return view('pages.publications.all',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function create(Category $categories)
	{
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
    	$curUser = \Auth::user();
    	$file_name = $this->dispatch(new \App\Jobs\SaveUserDataImage($curUser,$request->file('image'),'files'));
    	$request = $request->all();
    	$request['user_id'] = $curUser->id;
    	$request['image'] = $file_name;
  
        Publication::create($request);
  
        return redirect()->back();
    }

    public function detail($category,Publication $publication)
    {
    	$publication->user_name = $publication->user->name;
    	return view('pages.publications.detail',compact('publication'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Publication $publication)
    {
       return view('pages.publications.show',compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Publication $publication)
    {
    	return view('pages.publications.edit',compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(PublicationRequest $request,Publication $publication)
    {
    	$publication->update($request->all());
        $publication->save();
        
        return redirect()->back();
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
