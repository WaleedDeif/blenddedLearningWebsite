<?php
function hash_password($password){
	$password = trim($password);
	$password = sha1(md5(sha1(md5(sha1(sha1($password))))));
	return $password;
}
?>
