<?php
//this query to get the questions id of this exam
$q_id="SELECT `exam_id` , `question_id` ,`answer_id` FROM `question` WHERE `exam_id`='$exam_id'";
$res_id=mysqli_query($GLOBALS['connection'],$q_id);
$ques_num=mysqli_num_rows($res_id);
if($ques_num>0){
	$al_q = 0;
	$exam_result=0;
	$result_array = array();
	while($row=mysqli_fetch_assoc($res_id)){
		$al_q++;
		$question_id=$row['question_id'];

		$true_answer_id=intval($row['answer_id']);
		$answered_id="question_id_".$question_id;
		$answer_status = 0;
		if(isset($_POST[$answered_id]) && !empty($_POST[$answered_id])){
			// to check if there is any not posted answer
			$student_answer=intval(scr($_POST[$answered_id]));
			$check_ans = "SELECT `answer_id` , `question_id` FROM `answer` WHERE `answer_id` = '{$student_answer}' AND `question_id` = '{$question_id}' LIMIT 1";
			$check_ans_q = mysqli_query($GLOBALS['connection'],$check_ans);
			if($check_ans_q){
				if(mysqli_num_rows($check_ans_q) > 0){
					$check_ans2 = "SELECT `answer_id` , `question_id` FROM `question` WHERE `answer_id` = '{$student_answer}' AND `question_id` = '{$question_id}' LIMIT 1";
					$check_ans_q2 = mysqli_query($GLOBALS['connection'],$check_ans2);
					if($check_ans_q2){
						if(mysqli_num_rows($check_ans_q2) > 0){
							$answer_status = 1;
						}
					}
					// echo $student_answer."<br>";
					$result_array[$question_id] = array("answer_id" => $student_answer , 'status' => $answer_status);
				}
			}
		}
		
	// 	if(!isset($_POST[$answered_id]) || empty($_POST[$answered_id]) || $_POST[$answered_id]==NULL)
	// 	{

	// 		echo '<div class="alert alert-danger">لم يتم ارسال الامتحان من فضلك اجب على جميع الاسئلة</div>';
	// 		// redir($GLOBALS['domain'].'',5);
	// 		// die();
	// 	}else{
	// 		echo "echo $question_id.'<Br>';";
	// 	}
	// 	$student_answer=$_POST[$answered_id];//this is the chosen answer	
	// 	//increasing the exam result
	// 	if($student_answer==$true_answer_id)
	// 	{
	// 	$status=1;
	// 	$exam_result++;
	// 	}
	// 	else if($student_answer!=$true_answer_id)
	// 	{
	// 		$status=0;
	// 	}
	// 	//echo $question_id."<br>";
	// 	// inserting the answer to the db
	// 	$q_insert="INSERT INTO `result` (question_id,answer_id,student_id,status)VALUES('$question_id','$student_answer','$student_id','$status')";
	// 	$q_r=mysqli_query($GLOBALS['connection'],$q_insert);
	// 	//if($q_r)echo $student_answer." is inserted"." and status= ".$status."<br>";
	// }
	// //echo "the student result is  ".$exam_result." from ".$ques_num."<br>";
	// // calculating the result percentage
	// $perc_result=round((($exam_result/$ques_num)*100),2);
	// $q_whole_result="INSERT INTO `student_result` (exam_id,student_id,result)VALUES('$exam_id','$student_id','$perc_result')";
	// $q_result=mysqli_query($GLOBALS['connection'],$q_whole_result);
	// if($q_result)
	// 	{
	// 	// here iam gonna reidrect the student to see his results
	// 	echo '<div class="alert alert-info"><b>تم تسليم امتحانك بنجاح, ترقب ظهور نموذج الاجابة فى موعد نهاية الامتحان</b></div>';
	// 	redir($GLOBALS['domain'].'index.php?page=exam&exam_id='.$exam_id,5);
	}
	if($al_q == count($result_array)){
		$svall = 0;
		$perc_result = 0;
		foreach ($result_array as $qID => $qvalue) {
			$std_answt = $qvalue['answer_id'];
			$answ_res = intval($qvalue['status']);
			$perc_result += $answ_res;
			// echo $qkey.'- '.$qvalue['answer_id'].'<br>';
			$q_insert="INSERT INTO `result` (`question_id`,`answer_id`,`student_id`,`status`) VALUES ('{$qID}','{$std_answt}','{$student_id}','{$answ_res}')";
			$q_r=mysqli_query($GLOBALS['connection'],$q_insert);
			if($q_r){
				$svall++;
			}
		}
		if($svall == $al_q){
			$all_results = $perc_result / $al_q;
			$q_whole_result="INSERT INTO `student_result` (`exam_id`,`student_id`,`result`) VALUES ('{$exam_id}','{$student_id}','{$all_results}')";
			$q_result=mysqli_query($GLOBALS['connection'],$q_whole_result);
			if($q_result){

			}
			
		}else{}
		echo '<div class="alert alert-success">تم حفظ الامتحان جارى عرض النتيجة , رجاء الانتظار ......</div>';		
		redir($GLOBALS['domain'].'result/'.$exam_id,5);
		// echo "<pre>";print_r($result_array);echo "</pre>";
		
	}else{
		echo '<div class="alert alert-danger">لم يتم ارسال الامتحان من فضلك اجب على جميع الاسئلة</div>';		
	}
}
else{
echo "ERROR";	
}

?>
