<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user(){
    	
    	return $this->belongsTo('\App\Model\User','user_id','id'); 
    }

    public function publication(){

    	return $this->belongsTo('\App\Model\Publication','publication_id','id');
    }
}
