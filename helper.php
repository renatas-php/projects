<?php







class Helpers{
	
	public function textShort($text, $limit = 60){
		$text = $text."";
		$text = substr($text, 0, $limit);
		$text = $text."...";
		return $text;
	}





}



?>