<?php
	Html::macro('avatar', function($size='mini',$user_id,$user_avatar=null)
	{	
		/*
		 * sizes: normal,mini
		 * */
			return !empty($user_avatar) ? '/upload/users/'.$user_id.'/avatar/'.$size.'_'.$user_avatar : '/images/avatar_'.$size.'_default.png';
		
	});
	/******************************************/

	Html::macro('showUserImage', function($size='mini',$user_id,$dir,$file_name)
	{
		/*
		 * sizes: normal,mini
		 * */
		return !empty($filte_name) ? '/upload/users/'.$user_id.'/'.$dir.'/'.$size.'_'.$file_name:'/images/pub_default.png';
	
	});
	
	Html::macro('divTablePanel', function($head,$data,$edit=false)
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

	/***********publcations divTable*************/
	Html::macro('publicationDivTable', function($data,$count)
	{
		$i=1;
		$col=12/$count;
		$html = '';
		foreach($data as $item) {
			if($i==1||$i%$count==1){
				$html .='<div class="row">';
			}
			$html .= '<div class="col-md-'.$col.'">';
			$html.='<div class="publication-cell">';
			$html .= '<h3>'.$item->name.'</h3>';
			$html .= '<span>'.$item->created_at.'</span>';
			$html .= '<p>'.str_limit($item->description,300,'...').'</p>';
			$html.="</div>";
			$html.= '</div>';
			$i++;
			if($i%$count==1||$i==$count+1){
				$html .= '</div>';
			}
		}
		return $html;
	});
	
	/****************/
	
	Html::macro('showPublicProperty',function($head,$data){
		
		$html = '';
		
		foreach($head as $key=>$value){
			
			$html.='<div class="row">';
			$html.=  '<div class="col-md-3">';
			$html.=    '<b>'.$key.':</b>';
			$html.=   '</div>';
			$html.='  <div class="col-md-9">';
			$html.=$data->$value;
			$html.='  </div>';
			$html.='</div>';
		}
		return $html;
	});
