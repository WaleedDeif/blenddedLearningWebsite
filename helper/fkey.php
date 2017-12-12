<?php
function fkey($file_name)
{	
	$lnth = 40;
	$c = 0;
	reCreateFkey:
	if($c > 50){$lnth++;}
	$new_file_name=random_character($lnth);
	$slk = "SELECT `fkey` FROM `unit_files` WHERE `fkey` = '{$new_file_name}' LIMIT 1";
	$logkey_q = mysqli_query($GLOBALS['connection'],$slk); 
	if(mysqli_num_rows($logkey_q)>0) { 
		$c++;
		goto reCreateFkey;
	}
	return $new_file_name;
}
?>
