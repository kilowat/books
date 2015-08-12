<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Model\Publication;

class LastPublications extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'limit'=>5,
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run($user_id=null)
    {
        if($user_id){
            $publications = Publication::where('user_id','=',$user_id)
                            ->with('category')
                            ->take($this->config['limit'])
                            ->orderBy('created_at','desc')
                            ->get();
        }else{
            $publications = Publication::take($this->config['limit'])
                            ->with('category')
                            ->orderBy('created_at','desc')
                            ->get();
        }
       
        return view("widgets.last_publications", [
            'config' => $this->config,
        ],compact('publications'));
    }
}