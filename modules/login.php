<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>عبدالرزاق النوبى - تسجيل الدخول</title>
	<link rel="icon" href="<?php echo $site_data; ?>images-list/favicon.ico" type="image/x-icon" />
	<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet' type='text/css'>
	<style type="text/css">.body{z-index:-1;background-image:url('<?php echo $site_data; ?>images-list/full-cover-12.jpg');background-size:cover;filter:blur(4px);-webkit-filter:blur(4px);position:absolute;top:0;bottom:0;left:0;right:0}*{font-family:Cairo,sans-serif}body{margin:0;padding:0}.login{display:inline-block;border-radius:6px;margin-top:13%;direction:rtl;text-align:center;padding:5px}.logo{width:233px;height:auto;margin-bottom:10px}.input{display:block;width:254px;border:1px solid #d4d4d4;height:36px;margin-bottom:18px;border-radius:8px;padding-right:10px;transition:.4s}.input:focus{border:1px solid #14b1b4;outline:0;box-shadow:0 0 4px #14b1b4}label{color:#ff4728;width:128px;font-weight:700;margin:-1px -84px 0 -9px;float:right;text-align:right;cursor:pointer;font-size:18px}.start_login{background:#19b3b6;color:#fff;border:1px solid #19b3b6;height:34px;width:117px;border-radius:6px;cursor:pointer;outline:0}.wrapper{width:100%;z-index:9999;height:100%;text-align:center}.required{border:1px solid #ff4728!important;box-shadow:0 0 10px #ff4728!important;}.log-ntf{direction: rtl;}.log-loading{    width: 75px;}</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link type="text/css" rel="stylesheet" href="<?php echo $site_data; ?>css/bootstrap.min.css">
</head>
<body>
<div class="body"></div>
<div class="wrapper">
	<div class="login">
		<a href="<?php echo $GLOBALS['domain']; ?>" class="logo-link">
			<img src="<?php echo $site_data; ?>images/logo.png" class="logo">
		</a>
		<?php if(isset($_POST['submit_login']) && !empty($_POST['submit_login'])){require("login_action.php");} ?>
		<form class="login-form" method="post" action="<?php echo $GLOBALS['domain']; ?>login">
			<label for="username">اسم المستخدم</label>
			<input type="text" class="input" id="username" name="username" placeholder="اسم المستخدم" autofocus>

			<label for="password">الرقم السرى</label>
			<input type="password" class="input" id="password" name="password" placeholder="الرقم السرى">
			<input type="submit" name="submit_login" class="start_login" value="تسجيل الدخول">
		</form>
	</div>
</div>
<script type="text/javascript">$("form").on("submit",function(){$(".input").removeClass("required");var a=!1;return $("#username").val()?$("#password").val()?(a=!0,$(".input").removeClass("required")):$("#password").addClass("required").focus():$("#username").addClass("required").focus(),a});</script>
</body>
</html>