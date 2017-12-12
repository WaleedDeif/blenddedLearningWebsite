<?php
function del_sql($id){
	$x = FALSE;
	$s = "DELETE FROM `unit_files` WHERE `unit_files_id` = '{$id}' LIMIT 1";
	$del_q=mysqli_query($GLOBALS['connection'],$s);
	if($del_q){
		$x = TRUE;
	}
	return $x;
}
function delete_file($id){
	$deleted = FALSE;
	$s = "SELECT * FROM `unit_files` WHERE `unit_files_id` = '{$id}' LIMIT 1";
	$del_s=mysqli_query($GLOBALS['connection'],$s);
	if($del_s){
		if(mysqli_num_rows($del_s)>0){
			$file = mysqli_fetch_assoc($del_s);
			$file_id = $file['unit_files_id'];
			$file_title = $file['title'];
			$fkey = $file['fkey'];
			$type = $file['type'];
			if($type === "ytb"){
				$deleted = del_sql($file_id);
			}else{
				$del_file = $GLOBALS['path_to_uploads'].$fkey.'.'.$type;
				if(unlink($del_file)){
					$deleted = del_sql($file_id);
				}
			}
		}
	}
	return $deleted;
}
?>