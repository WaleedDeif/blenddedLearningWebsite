<?php
function is_admin_login(){
	$log = FALSE;
	if(isset($_SESSION['sess_domain']) && !empty($_SESSION['sess_domain'])){
		if($_SESSION['sess_domain'] === $GLOBALS['domain']){
			if(isset($_SESSION['admin_name']) && !empty($_SESSION['admin_name'])){
				if(isset($_SESSION['sess_sh']) && !empty($_SESSION['sess_sh'])){
					if($_SESSION['sess_sh'] === sha1($_SESSION['admin_name'])){
						$log = TRUE;
					}
				}
			}
		}
	}

	return $log;
}
?>