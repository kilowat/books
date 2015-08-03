<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
     
	protected $table = 'publications';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description','category_id','user_id','image'];
    
    protected $hidden = ['_token'];
    
    public function getCreatedAtAttribute($value){
    	return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y H:i:s');
    }
}
