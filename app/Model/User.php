<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'avatar', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

	public function avatarNormal(User $user){
		return !empty($user->avatar) ? '/upload/users/'.$user->id.'/avatar/normal_'.$user->avatar : '/images/avatar_normal_default.png';
	}
	
	public function avatarMini(User $user){
		return !empty($user->avatar) ? '/upload/users/'.$user->id.'/avatar/mini_'.$user->avatar : '/images/avatar_mini_default.png';
		
	}
	
	public function messages(){
		
		return $this->hasMany('App\Model\UserMessage','user_id','id');
	}
}
