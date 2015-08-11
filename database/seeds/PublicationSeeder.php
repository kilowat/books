<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PublicationSeeder extends Seeder{
	
	public function run(){
	
		$descr = ' Равным образом сложившаяся структура организации позволяет оценить значение форм развития. Таким образом реализация намеченных плановых заданий играет важную роль в формировании существенных финансовых и административных условий. Таким образом укрепление и развитие структуры способствует подготовки и реализации существенных финансовых и административных условий. Равным образом постоянный количественный рост и сфера нашей активности влечет за собой процесс внедрения и модернизации форм развития. Идейные соображения высшего порядка, а также новая модель организационной деятельности способствует подготовки и реализации новых предложений. Таким образом рамки и место обучения кадров способствует подготовки и реализации системы обучения кадров, соответствует насущным потребностям.';
		
		$pub = [
					['name'=>'Деловая литература','description'=>$descr,'user_id'=>1,'category_id'=>1,'image'=>'pub_default.png'],
					['name'=>'Детское','description'=>$descr,'user_id'=>1,'category_id'=>1,'image'=>'pub_default.png'],
					['name'=>'Документальная литература','description'=>$descr,'user_id'=>1,'category_id'=>1,'image'=>'pub_default.png'],
					['name'=>'Компьютеры и Интернет','description'=>$descr,'user_id'=>1,'category_id'=>1,'image'=>'pub_default.png'],
					['name'=>'Любовные романы','description'=>$descr,'category_id'=>1,'user_id'=>1,'image'=>'pub_default.png'],
					['name'=>'Поэзия и Драматургия','description'=>$descr,'user_id'=>1,'category_id'=>1,'image'=>'pub_default.png'],
					['name'=>'Приключения','description'=>$descr,'user_id'=>1,'category_id'=>1,'image'=>'pub_default.png'],
					['name'=>'Проза','description'=>$descr,'user_id'=>1,'category_id'=>1,'image'=>'pub_default.png'],
					['name'=>'Прочее','description'=>$descr,'user_id'=>1,'category_id'=>1,'image'=>'pub_default.png'],
					['name'=>'Фантастика','description'=>$descr,'user_id'=>1,'category_id'=>1,'image'=>'pub_default.png'],					
		];
		
		foreach($pub as $publication){
			\App\Model\Publication::create($publication);
		}
		
	}
}