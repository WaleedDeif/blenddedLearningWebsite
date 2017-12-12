<?php
$set_visits = TRUE;
if(isset($_GET['ipage']) && !empty($_GET['ipage'])){
	if($_GET['ipage'] === "logout_done"){$set_visits = FALSE;}
	if(isset($_SESSION['visit_key']) && !empty($_SESSION['visit_key'])){
		// echo $_SESSION['visit_key'];
		$_SESSION['visit_key'] = null;unset($_SESSION['visit_key']);
	}
}
if($set_visits === TRUE){
	// echo "sssssssssssssetttttttttcvivi";
	if(isset($_SESSION['visit_key']) && !empty($_SESSION['visit_key'])){
		$vsql = "UPDATE `student_log` SET `check_out` = '".time()."' ";
		if(is_student_login() === TRUE){
			$slkx = "SELECT `log_key` , `student_id` FROM `student_log` WHERE `student_id` = '{$student_id}' AND `log_key` = '{$_SESSION['visit_key']}' LIMIT 1";
			$logkey_qx = mysqli_query($GLOBALS['connection'],$slkx); 
			if($logkey_qx){
				if(mysqli_num_rows($logkey_qx) == 0) {
					$vsql .= ", `student_id` = '{$student_id}' ";
				}
			}
		}
		$vsql .= "WHERE `log_key` = '{$_SESSION['visit_key']}' LIMIT 1";
		mysqli_query($GLOBALS['connection'],$vsql); 
	}else{ 
		require("set_visit.php");
	}
}
?>