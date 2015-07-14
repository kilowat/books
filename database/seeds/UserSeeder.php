<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder{
	
	public function run(){
		
		$users = [
					[
						'name'=>'kilowat',
						'email'=>'kilowat@mail.ru',
						'password'=>bcrypt(123456),
					],
				
					[
						'name'=>'john',
						'email'=>'john@mail.ru',
						'password'=>bcrypt(123456),
					],
				
					[
						'name'=>'mike',
						'email'=>'mike@mail.ru',
						'password'=>bcrypt(123456),
					]
		];
		foreach($users as $user){
			\App\Model\User::create($user);
		}
	}
}