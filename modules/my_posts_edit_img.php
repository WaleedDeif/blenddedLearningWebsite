<?php
set_time_limit(60*20);
$file_in_mb = '50M';
ini_set('post_max_size', $file_in_mb);
ini_set('upload_max_filesize', $file_in_mb);
ini_set('max_execution_time', 600000);
ini_set('max_input_time', 600000);
ini_set('memory_limit', -1);

if(isset($_FILES['post_img']) && !empty($_FILES['post_img']) &&  isset($_FILES['post_img']['name']) && !empty($_FILES['post_img']['name'])){
	$targetFile= basename($_FILES["post_img"]["name"]) ;
	$file_type = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
	$img_allow = array('jpg','png','gif','pmp');
	if(in_array($file_type, $img_allow)){
		$main_img_name = $GLOBALS['files_folder'].'posts/'.$post_id;
		$put_img_in = $main_img_name.'.'.$file_type;
		if(move_uploaded_file($_FILES["post_img"]["tmp_name"],$put_img_in)){
			require($GLOBALS['helper']."copy_img.php");
			copy_img($put_img_in,$main_img_name.'_200.'.$file_type,200);
			copy_img($put_img_in,$main_img_name.'_800.'.$file_type,800);
			copy_img($put_img_in,$main_img_name.'_100.'.$file_type,100);
			chmod($put_img_in, 0777);
			$sq2 = "UPDATE `post` SET `img` = '{$file_type}' WHERE `post_id` = '{$post_id}' LIMIT 1";
			$q2 = mysqli_query($GLOBALS['connection'],$sq2);
			if($q2){
				$img = $file_type;
			}else{goto imgNot;}
		}else{
			imgNot:
			echo '<div class="alerter alert alert-danger">لم يتم رفم الصورة</div>';	
		}
	}else{
		echo '<div class="alerter alert alert-danger">رجاء اختيار صورة مناسبة</div>';
	}
}
?>