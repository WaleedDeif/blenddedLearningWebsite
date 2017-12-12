<?php
if(isset($GLOBALS['get_page_all'][1]) && !empty($GLOBALS['get_page_all'][1])){
	$exam_id = scr($GLOBALS['get_page_all'][1]);
	if(is_numeric($exam_id)){
		$exam_query="SELECT * FROM `exam` WHERE `exam_id` = '{$exam_id}' LIMIT 1 ";
		$exam_result=mysqli_query($GLOBALS['connection'],$exam_query);
		if($exam_result){
			if(mysqli_num_rows($exam_result)>0){
				require($GLOBALS['helper']."calc_exam.php");
				$exam_date=mysqli_fetch_assoc($exam_result);
				$exam_id = $exam_date['exam_id'];
				$end_date = $exam_date['end_date'];
				$start_date = $exam_date['start_date'];
				$calc_exam = calc_exam($start_date,$end_date);
	            $calc_exam_status = $calc_exam['status'];
	            if(isset($calc_exam_status) && !empty($calc_exam_status)){
	             if($calc_exam_status === "answers" || $calc_exam_status === "exam"){
	             	$open_exam_app = $calc_exam_status;
	             	if(isset($GLOBALS['get_page_all'][2]) && !empty($GLOBALS['get_page_all'][2])){
						$get_app = scr($GLOBALS['get_page_all'][2]);
						if($get_app === "answers"){$open_exam_app = "answers_student";}
					}
	             	require("exam_{$open_exam_app}.php");
	             }else{goto EnEx;}
	            }else{goto EnEx;}
			}else{goto EnEx;}
		}else{goto EnEx;}
		
	// require("exam_validate.php");

	// if($is_allowed==true && $is_submitted==false && $as_result_4all==false){	
	// 	require("exam_view.php");
	// }else if($is_allowed==true && $is_submitted==true && $as_result_4all==false){
	// 	require("student_answers.php");
	// }else if( $as_result_4all==true){
	// 	require("guide_answer.php");
	// }else{
	// 	redir($GLOBALS['domain'].'index.php?page=units');
	// }
}else{goto EnEx;}
}else{
	EnEx:
	redir($GLOBALS['domain'],0);
}
?>
