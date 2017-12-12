<?php
$_SESSION['student_name'] = null;unset($_SESSION['student_name']);
$_SESSION['sess_student_domain'] = null;unset($_SESSION['sess_student_domain']);
$_SESSION['sess_student_sh'] = null;unset($_SESSION['sess_student_sh']);
$_SESSION['student_username'] = null;unset($_SESSION['student_username']);	
$_SESSION['student_id'] = null;unset($_SESSION['student_id']);
$_SESSION['log_key'] = null;unset($_SESSION['log_key']);
$_SESSION['unit_covers'] = null;unset($_SESSION['unit_covers']);
if(isset($_SESSION['visit_key']) && !empty($_SESSION['visit_key'])){
	$_SESSION['visit_key'] = null;unset($_SESSION['visit_key']);
}

session_destroy();
redir($GLOBALS['domain'].'cv/?ipage=logout_done&g='.md5(time()).'&lg='.sha1(time()),0);
?>