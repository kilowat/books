<?php
	Html::macro('avatar', function($size='mini',$user_id,$user_avatar)
	{	
		/*
		 * sizes: normal,mini
		 * */
			return !empty($user_avatar) ? '/upload/users/'.$user_id.'/avatar/'.$size.'_'.$user_avatar : '/images/avatar_'.$size.'_default.png';
		
	});
	/******************************************/

	HTML::macro('divTablePanel', function($head,$data,$edit=false)
	{
		$html="";
		$html.= '<div class="panel panel-default">';
		$html.= '<table class="table table-striped">';
		$html.= '<div class="panel-heading">Управление публикациями</div>';
		$html.= '<thead>';
		$html.= '<tr>';
			foreach($head as $key=>$value){
				$html.='<th>'.$value.'</th>';
			}
		if($edit){
			$html.='<th>Действия</th>';	
		}
			
		$html.='</tr>';
		$html.= '</thead>';
		
		$html.='<tbody>';
		foreach($data as $item) {
			$html.= '<tr>';
			foreach($head as $key2=>$value2){
	
				$html.='<th>'.$item->$key2.'</th>';
			}
			if($edit){
				$html.='<th>';
				$html.='<a href="'.route($edit.'.show',$item->id).'">show</a> | ';
				$html.='<a href="'.route($edit.'.edit',$item->id).'">edit</a> | ';
				$html.='<a href="'.route($edit.'.destroy',$item->id).'">del</a>';
				$html.='</th>';
			}
			$html.= '</tr>';
		}
		$html.= '</tbody>';
		$html.= '</table>';
		$html.= '</div>';
		//dd($html);
		return $html;
	});
	/***********************************************/

