<?php
function redir($url , $wait = 1){
		$waitSec = $wait * 1000; 
	    $code = '<meta http-equiv="refresh" content="'.$wait.';url='.$url.'" />';
        $code .= '<script type="text/javascript">setTimeout(function(){';
        $code .= 'location.replace("'.$url.'");';
        $code .= 'window.location.href="'.$url.'";';
        $code .= '}, '.$waitSec.');</script>';

        echo $code;
}
?>