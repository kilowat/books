<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function publications()
    {
		return $this->hasMany('App\Model\Publication');
	}
}
