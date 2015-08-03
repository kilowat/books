<?php
Menu::handler('category')->hydrate(function(){
	
	return App\Model\Category::all();	

},function($child,$item){
	
	$child->add($item->slug,$item->name);
});

Menu::handler('category')->addClass('list-group');
Menu::handler('category')->getItemsAtDepth(0)->map(function($item){
	//var_dump($item);
	$item->getContent()->addClass('list-group-item');
});