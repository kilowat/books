<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Publication extends Model
{
    const ENABLED = 1;
    const DISABLED = 0;

	protected $table = 'publications';
    protected $fillable = ['name', 'description','category_id','user_id','image','active'];
    protected $hidden = ['_token'];
    
    public function getCreatedAtAttribute($value){
    	return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y H:i:s');
    }
    
    public function user(){
    	return $this->belongsTo('\App\Model\User','user_id','id'); 
    }
    
    public function category(){
    	return $this->belongsTo('\App\Model\Category');
    }
    
    public function comments(){
    	return $this->hasMany('\App\Model\Comment','publication_id','id');
    }

    public function scopeActive($query){
        return $query->where('active','=',self::ENABLED);
    }
    
}
