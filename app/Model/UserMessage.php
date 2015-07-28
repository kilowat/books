<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    public function user(){
    	
    	return $this->belongsTo('\App\Model\User','user_id','id');
    	
    }
    public function userSend(){
    	 
    	return $this->belongsTo('\App\Model\User','user_send_id','id');
    	 
    }
    /*
    public function getMessageTypeAttribute($value){
    	return $res = ($value=='in')?'Входящее':'Исходящее';
    }
    */
}
