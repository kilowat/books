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
    public function lastMessages($user_id){
    	$query = 'SELECT user_messages.id,user_messages.user_id,user_messages.user_send_id,user_messages.text,user_messages.message_type,user_messages.confirmed,
				users.name,users.avatar,user_messages.created_at as ct
			From user_messages
			inner join users on users.id = user_messages.user_send_id
			WHERE user_id = ?
			AND
			user_messages.created_at in(
				SELECT max(user_messages.created_at) as ct
				From user_messages
				inner join users on users.id = user_messages.user_send_id
				WHERE user_id = ?
				GROUP BY users.id
			)';
    	return \DB::select($query,[$user_id,$user_id]);
    	
    }
    */
    public function lastMessages($user_id){
    	$res = \DB::table('user_messages')
    			->select('user_messages.id','user_messages.user_id','user_messages.user_send_id','user_messages.text','user_messages.message_type','user_messages.confirmed',
				'users.name','users.avatar','user_messages.created_at')
    			->join('users', 'users.id', '=', 'user_messages.user_send_id')
    			->where('user_id','=',$user_id)
 				->whereIn('user_messages.created_at',function($query){
 					$query->select(\DB::raw('max(user_messages.created_at) as ct'))
 					->from('user_messages')
 					->join('users', 'users.id', '=', 'user_messages.user_send_id')
 					->groupBy('users.id');
 				})
 				->orderBy('created_at','desc')
    			->get();
    	return $res;
    }
    
    /*
    public function getMessageTypeAttribute($value){
    	return $res = ($value=='in')?'Входящее':'Исходящее';
    }
    */
    
}
