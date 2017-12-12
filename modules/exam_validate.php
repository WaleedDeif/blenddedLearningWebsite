<?php 
$as_result_4all=false; // exam is corrected and it is time is overed
$is_allowed=false; // exam status is shown to students
$is_submitted=false; // student finished the exam
//$is_saved=false; // student saved some answers
$student_id=$_SESSION['student_id'];


if(isset($exam_id) && !empty($exam_id) && is_numeric($exam_id))
{

	// true id is sent let's check the status of exam 
	$quu="SELECT `status` FROM `exam` WHERE exam_id='$exam_id'";
	$quu_result=mysqli_query($GLOBALS['connection'],$quu);
	if(mysqli_num_rows($quu_result)==0) { goto unvalid_id;}
	$row=mysqli_fetch_assoc($quu_result);
	$status=$row['status'];
	if($status==0){goto unvalid_id;}
	if($status==1){$is_allowed=true;}
	if($status==2){$as_result_4all=true;}
	
	$qu="SELECT `result`,`exam_id`,`student_id` FROM student_result WHERE exam_id='$exam_id' && student_id='$student_id'";
	$qu_result=mysqli_query($GLOBALS['connection'],$qu);
	if(mysqli_num_rows($qu_result)==0)
	 {
	  $is_submitted=false;
	// if i want to check is saved should be here 
	 }
	else if(mysqli_num_rows($qu_result)==1){$is_submitted=true;}

}
else
{
	unvalid_id:
	{
	$is_allowed=false;
	redir($GLOBALS['domain'].'index.php?page=units');
	}
}
?>
