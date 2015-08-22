<?php

namespace App\Lib;
/*
 * working with publications file
 * @var int PAGE_SIZE length symbol on one page
 */

class PubText {
	

	CONST PAGE_SIZE = 1000;
	
	private $pubTextPath;
	
	
	function __construct(){
		
		$this->pubTextPath = storage_path('app'.DIRECTORY_SEPARATOR.'publicatons');
		if (!is_dir($this->pubTextPath)) {
			// dir doesn't exist, make it
			mkdir($this->pubTextPath);
		
		}
		

	}
	
	/*
	 * @param int $pubId 
	 * @param UploadedFile $text publication text format .txt
	 */
	public function saveText($pubId,$text){
		
		if (!is_dir($this->pubTextPath.DIRECTORY_SEPARATOR.$pubId)) {
			// dir doesn't exist, make it
			mkdir($this->pubTextPath.DIRECTORY_SEPARATOR.$pubId);
		}
		
		$i = 0; $y = 0;
		
		foreach(file($text) as $string){
			if ($i == self::PAGE_SIZE) {
				$y++;
				$i = 0;
			}
			file_put_contents($this->pubTextPath.DIRECTORY_SEPARATOR.$pubId.DIRECTORY_SEPARATOR.'page-' . $y . '.html', $string, FILE_APPEND);
			$i++;
		
		}
	}
}
