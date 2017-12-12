<?php
require("random_character.php");
$length = 50;$ln=0;
CreatLoginKey:
if($ln >= 10){$length++;}
$v_key = random_character($length);
$ln++;
$slk = "SELECT `log_key` FROM `student_log` WHERE `log_key` = '{$v_key}' LIMIT 1";
$logkey_q = mysqli_query($GLOBALS['connection'],$slk); 
if(mysqli_num_rows($logkey_q)>0) { 
	goto CreatLoginKey;
}
$tm = time();
$sinlogk = "INSERT INTO `student_log` (`log_key` , `check_in` , `check_out`) VALUES('{$v_key}' , '{$tm}' , '{$tm}')";
if(mysqli_query($GLOBALS['connection'],$sinlogk) ){
	$_SESSION['visit_key'] = $v_key;
}
?>