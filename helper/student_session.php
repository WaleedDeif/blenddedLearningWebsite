<?php
function is_student_login(){
	$is_log = FALSE;
	if(isset($_SESSION['sess_student_domain']) && !empty($_SESSION['sess_student_domain'])){
		if($_SESSION['sess_student_domain'] === $GLOBALS['domain']){
			if(isset($_SESSION['student_name']) && !empty($_SESSION['student_name'])){
				if(isset($_SESSION['student_id']) && !empty($_SESSION['student_id'])){
				   if(isset($_SESSION['log_key']) && !empty($_SESSION['log_key'])){
					if(isset($_SESSION['sess_student_sh']) && !empty($_SESSION['sess_student_sh'])){
						if($_SESSION['sess_student_sh'] === sha1(md5($_SESSION['student_name']))){
							if(isset($_SESSION['student_username']) && !empty($_SESSION['student_username'])){
								$is_log = TRUE;
							}
						}
					}
				  }
				}
			}
		}
	}

	return $is_log;
}
?>