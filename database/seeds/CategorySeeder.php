<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategorySeeder extends Seeder{
	public function run(){
		
		$categories = [
					['name'=>'Деловая литература','slug'=>'detectives&Thrillers'],
					['name'=>'Детское','slug'=>'for_childern'],
					['name'=>'Документальная литература','slug'=>'nonfiction'],
					['name'=>'Компьютеры и Интернет','slug'=>'computers_and_internet'],
					['name'=>'Любовные романы','slug'=>'romance'],
					['name'=>'Поэзия и Драматургия','slug'=>'science_and_education'],
					['name'=>'Приключения','slug'=>'adventure'],
					['name'=>'Проза','slug'=>'prose'],
					['name'=>'Прочее','slug'=>'other'],
					['name'=>'Фантастика','slug'=>'fiction'],					
		];
		
		foreach($categories as $category){
			\App\Model\Category::create($category);
		}
		
	}
}