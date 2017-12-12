<?php
function create_password(){
	$password=""; 
	$alphabet= array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'); 
	$i = 1; 
	while($i<6){
		$password= $password.$alphabet[rand(1,25)]; 
		$i++ ; 
	}
	$password= $password.rand(10,99); 
	return $password; 

}
?>