<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user(){
    	
    	return $this->belongsTo('\App\Model\User','user_id','id'); 
    }
}