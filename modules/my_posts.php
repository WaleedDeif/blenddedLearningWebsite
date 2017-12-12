<?php
$req = "list";
if(isset($GLOBALS['get_page_all'][1]) && !empty($GLOBALS['get_page_all'][1])){
	$get_post_id = scr($GLOBALS['get_page_all'][1]);
	if(is_numeric($get_post_id)){
		$req = "edit";
	}
}

require("my_posts_{$req}.php");
?>