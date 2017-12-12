<?php
if (!function_exists('random_character')){
function random_character($length = 10){
	$array = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$randTo = count($array) - 1;
	$randFrom = 0;
	$reta = '';
	for ($i=0; $i < $length; $i++) {
		$rand = rand($randFrom,$randTo);
		$reta .= $array[$rand];
	}
	return $reta;
}}
?>
