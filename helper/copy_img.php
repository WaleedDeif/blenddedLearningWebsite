<?php
function copy_img($old_dst,$new_dst, $width){
			if(!list($w, $h) = getimagesize($old_dst)) return UNSUPPORTED_FILE;
			$kind_type = strtolower(substr(strrchr($old_dst,"."),1));
			if($kind_type == 'jpeg') $kind_type = 'jpg';
			switch($kind_type){
			case 'bmp': $img = imagecreatefromwbmp($old_dst); break;
			case 'gif': $img = imagecreatefromgif($old_dst); break;
			case 'jpg': $img = imagecreatefromjpeg($old_dst); break;
			case 'png': $img = imagecreatefrompng($old_dst); break;
			default : return UNSUPPORTED_FILE; } $x = 0;
			$height = ($h * $width) / $w;
			$new = imagecreatetruecolor($width, $height);
			if($kind_type == "gif" or $kind_type == "png"){
			imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
			imagealphablending($new, false);
			imagesavealpha($new, true); 
		} imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);
			switch($kind_type){
			case 'bmp': imagewbmp($new, $new_dst); break;
			case 'gif': imagegif($new, $new_dst); break;
			case 'jpg': imagejpeg($new, $new_dst); break;
			case 'png': imagepng($new, $new_dst); break;
			}
			chmod($new_dst, 0777);
		#return true;
	}
?>