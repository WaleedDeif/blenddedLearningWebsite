<?php
  $time_zone = "Asia/Riyadh";
  date_default_timezone_set($time_zone); 
  // echo date('d-m-Y H:i:s'); //Returns IST

    $GLOBALS['connection'] = new mysqli('localhost','nbslhdbusr','n]rEk#3F_Gf-','abrzknbyslh');//new
// $GLOBALS['connection'] = new mysqli('localhost','nbsbusrfnl','?MZo{m)Pr}0a','abrzknbyslh_final');//test-beta2
        
    if ($GLOBALS['connection'] -> connect_error){
    	die('not connected');
    }else{
    	$GLOBALS['connection'] -> query("SET NAMES 'utf8'");
    	$GLOBALS['connection'] -> set_charset('utf8');
    	$GLOBALS['connection'] -> query("SET COLLATION_CONNECTION = utf8_general_ci");
    	$GLOBALS['connection'] -> query("SET time_zone = '{$time_zone}'");
    }
?>