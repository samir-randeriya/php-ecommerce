<?php
/**
-- format class--
**/

class format
{
	 public function formatDate($date)
	 {
      return  date('F j, Y, g:i a', strtotime($date));
	 }
	 
	 
	 public function textShorten( $text, $limit = 400)
	 {
	 $text = $text. "";
 	 $text = substr($text,0,$limit);
	 $text = $text."........";
	 return $text;
	 }
	 
	 public function validation($data)
	 {
	 $data= trim($data);
	 $data = stripcslashes($data);
	 $data = htmlspecialchars($data);
	 return $data;
	 }
	 
	 
	 public function title()
	 {
	 $path = $_SERVER['SCRIPT_FILENAME'];
	 $title = basename($path, '.php');
	 if($title  == 'index')
	 	{
		$title = 'Daily News Service | Home Page';
		}elseif($title  == 'contact')
		{
		$title = 'Contact';
		}
		return $title = ucwords($title);
		
		
	 }
	 
	 
}

?>