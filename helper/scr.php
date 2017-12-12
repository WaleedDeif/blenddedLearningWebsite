<?php
	function find_text($string,$text){
	$return = FALSE;
	if(is_array($text)){
		foreach ($text as $key) {
			$strpos_val = strpos($string, $key);
			if(isset($strpos_val) && !empty($strpos_val)){
				$return = TRUE;
				goto EndAndReturn;
			}
		}
	}elseif(is_array($string)){
		foreach ($string as $strng_key) {
			if(strpos($strng_key, $text)){
				$return = TRUE;
				goto EndAndReturn;
			}
		}
	}else{
		// echo $string.'<br>';
		if(strpos($string, $text)){
			$return = TRUE;
			goto EndAndReturn;
		}
	}	

	EndAndReturn:						
	return $return;
}
function scr($get_post) {

	$magic_quotes_active = get_magic_quotes_gpc();
	$new_enough_php = function_exists("mysql_real_escape_string");
	if($new_enough_php) {
		// undo any magic qoutes cat WORK in DataBase
		if($magic_quotes_active) {$get_post = stripcslashes($get_post);}
		// $get_post = mysql_real_escape_string($get_post);
		// $get_post = mysql_escape_string($get_post);
	}else {// before PHP v4.3.0
		if(!$magic_quotes_active) {$get_post = addslashes($get_post);}
	}
	$remove_items = array("|",'`',"*","'",'"',"\\");//,'*','\\',''
	foreach ($remove_items as $remove_item) {
		if(find_text($get_post,$remove_item)){
			$get_post = str_replace($remove_item, '', $get_post);
		}
	}
	return $get_post;
}
?>