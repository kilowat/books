<?php
namespace App\Lib;

class Menu {

	public static function  __callStatic($name,$args){
		
		throw new \Exception('you not have method '.$name);
	}
	public static function add(Array $menus){
		
		foreach($menus as $menu){
			self::$menu();
		}
	}
	
	private static function top(){
		
		\Menu::handler('category')->hydrate(function(){
			
			return \App\Model\Category::all();	
		
		},function($child,$item){
			
			$child->add(route('publication.category',$item->slug),$item->name);
		});
		
		\Menu::handler('category')->addClass('list-group');
		\Menu::handler('category')->getItemsAtDepth(0)->map(function($item){
			if($item->isActive())
				$item->getContent()->addClass('active');
			$item->getContent()->addClass('list-group-item');
		});
	}
}

