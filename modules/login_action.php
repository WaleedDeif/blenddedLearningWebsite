<?php
$set_visits = FALSE;
$ntf_style = "danger";
$ntf = "رجاء اكمل بيانات النموذج";

if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){

	// require("../helper/config.php");
	$ntf = "بيانات الدخول غير صحيحة";
	$username = scr(trim($_POST['username']));
	$password = scr(trim($_POST['password']));
	// $password = md5(sha1(md5(sha1($password))));
	require($GLOBALS['helper'].'hash_password.php');
	$password= hash_password($password); 
	$log_sql = "SELECT `student_id` , `name` , `status` , `username` , `password` FROM `student` WHERE `status` = '1'  AND `username` = '{$username}' AND `password` = '{$password}' LIMIT 1";
	$log_q = mysqli_query($GLOBALS['connection'],$log_sql); 
      if(mysqli_num_rows($log_q)>0) { 
      		$log_data = mysqli_fetch_assoc($log_q);
      		$name = $log_data['name'];
      		$student_id = $log_data['student_id'];
      		
      		require($GLOBALS['helper']."random_character.php");
      		$length = 50;$ln=0;
      		CreatLoginKey:
      		if($ln >= 10){$length++;}
      		$login_key = random_character($length);
      		$ln++;
      		$slk = "SELECT `log_key` FROM `student_log` WHERE `log_key` = '{$login_key}' LIMIT 1";
      		$logkey_q = mysqli_query($GLOBALS['connection'],$slk); 
		      if(mysqli_num_rows($logkey_q)>0) { 
		      	goto CreatLoginKey;
		      }
		      $tm = time();
		      $sinlogk = "INSERT INTO `student_log` (`student_id` , `log_key` , `check_in` , `check_out`) VALUES('{$student_id}' , '{$login_key}' , '{$tm}' , '{$tm}')";
		     if(mysqli_query($GLOBALS['connection'],$sinlogk) ){
		     	if(isset($_SESSION['visit_key']) && !empty($_SESSION['visit_key'])){
					$xf =mysqli_query($GLOBALS['connection'],"DELETE FROM `student_log` WHERE `log_key` = '{$_SESSION['visit_key']}' LIMIT 1");
					$_SESSION['visit_key'] = null;unset($_SESSION['visit_key']);
		     	}
		     	$_SESSION['sess_student_domain'] = $GLOBALS['domain'];
				$_SESSION['sess_student_sh'] = sha1(md5($name));
				$_SESSION['student_name'] = $name;
				$_SESSION['student_id'] = $student_id;
				$_SESSION['unit_covers'] = array();
				$_SESSION['student_username'] = $username;
				$_SESSION['log_key'] = $login_key;
				$ntf_style = "success";
	   			$ntf = "<span>تم تسجيل الدخول مرحبا <u>{$name}</u></span><br><img src='{$site_data}images/loading.gif' class='log-loading'>";
	   			echo '<style type="text/css">.login-form{display:none}</style>'; 
	   			redir($GLOBALS['domain'],2);
		     }
      }
}
?>
<div class="log-ntf alert alert-<?php echo $ntf_style; ?>"><?php echo $ntf; ?></div>