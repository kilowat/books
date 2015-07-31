<?php
	Html::macro('avatar', function($size='mini',$user_id,$user_avatar)
	{	$html = '';
		switch($size){
			case 'mini': return !empty($user_avatar) ? '/upload/users/'.$user_id.'/avatar/mini_'.$user_avatar : '/images/avatar_mini_default.png';break;
			case 'normal': return !empty($user_avatar) ? '/upload/users/'.$user_id.'/avatar/normal_'.$user_avatar : '/images/avatar_normal_default.png';break;
		}
   		
	});
