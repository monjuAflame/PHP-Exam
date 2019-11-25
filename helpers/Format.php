<?php

/**
* Format class
*/
class Format{
	
	public function formaDate($date){

		return date('j M Y', strtotime($date));

	}
	public function textShorten($body, $limit = 400){

		$text = $body. "";
		$shortText = substr($body, 0, $limit);
		$short_and_space = substr($body, 0, strrpos($shortText, ' '));
		$short = $short_and_space. "....";

		return $short;

	}

	public function validation($data){
		$trim = trim($data);
		$stripcslashes = stripcslashes($trim);
		$htmlspecialchars = htmlspecialchars($stripcslashes);
		return $htmlspecialchars;
	}

	public function title(){
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path, '.php');
		$title = str_replace('_', ' ', $title);
		if ($title == 'index') {
			$title = 'BloodGroup';
		} elseif ($title == 'home') {
			$title = 'Home';
		}
		return $title = ucwords($title);
	}



}



?>