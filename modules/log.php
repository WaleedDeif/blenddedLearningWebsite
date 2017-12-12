<?php
require($GLOBALS['helper'].'hash_password.php'); 

$ntf_style = "danger";
$ntf = "رجاء اكمل بيانات النموذج";
if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
	require($GLOBALS['helper']."config.php");
	$ntf = "بيانات الدخول غير صحيحة";
	$username = scr(trim($_POST['username']));
	$password = scr(trim($_POST['password']));
	$password = hash_password($password);
	$log_sql = "SELECT `student_id` , `name` , `status` , `username` , `password` FROM `student` WHERE `status` = '1'  AND `username` = '{$username}' AND `password` = '{$password}' LIMIT 1";
	$log_q = mysqli_query($GLOBALS['connection'],$log_sql); 
      if(mysqli_num_rows($log_q)>0) { 
      		$log_data = mysqli_fetch_assoc($log_q);
      		$name = $log_data['name'];

      		$_SESSION['sess_student_domain'] = $GLOBALS['domain'];
			$_SESSION['sess_student_sh'] = sha1(md5($name));
			$_SESSION['student_name'] = $name;
			$_SESSION['student_username'] = $username;

   			$ntf_style = "success";
   			$ntf = "<span>تم تسجيل الدخول مرحبا <u>{$name}</u></span><br><img src='{$site_data}images/loading.gif' class='log-loading'>";
   			echo '<style type="text/css">.login-form{display:none}</style>'; 

   			redir($GLOBALS['domain'],2);
      }
}
?>
<div class="log-ntf alert alert-<?php echo $ntf_style; ?>"><?php echo $ntf; ?></div>