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
    protected $fillable = ['name', 'description','category_id','user_id'];
    
    protected $hidden = ['_token'];
}
