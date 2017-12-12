<?php
function create_username(){
	$username= "nouby_"; 
	$num = rand(1000,9999); 
	$username= $username.$num ; 
	return $username ; 

}

?>