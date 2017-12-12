<?php
 require("exam_script.php");
	$exam_query="SELECT `title` FROM exam WHERE exam_id='$exam_id'";
	$exam_result=mysqli_query($GLOBALS['connection'],$exam_query);
	if(mysqli_num_rows($exam_result)>0)
	{
		$rowx=mysqli_fetch_assoc($exam_result);
		$exam_title=$rowx['title'];
	}
?>
<section class="sub-page-banner dna-cover dna-cover-4 text-center" data-stellar-background-ratio="0.6">
    <div class="overlay"></div>
    
    <div class="container">
        <h1 class="entry-title"><?php echo $exam_title;?></h1>
    </div>
    
</section>

<?php
/// view questions and 
$query_quesx="SELECT `exam_id` , `question_id` FROM `question` WHERE `exam_id`='$exam_id'";
$res_quesx=mysqli_query($GLOBALS['connection'],$query_quesx);
if($res_quesx){
$question_num=mysqli_num_rows($res_quesx);

if($question_num>0)
{	
	$astnsIDs = '';
	while($qss=mysqli_fetch_assoc($res_quesx)){$astnsIDs .= $qss['question_id'].',';}$astnsIDs = substr($astnsIDs, 0,-1);
	$chech_student_sql = "SELECT `question_id` , `student_id` FROM `result` WHERE `student_id` = '{$student_id}' AND `question_id` IN ({$astnsIDs})";	
	$chech_student_q = mysqli_query($GLOBALS['connection'],$chech_student_sql);
	if($chech_student_q){
		if(mysqli_num_rows($chech_student_q) == 0){
?>


 <div id="sub-page-content" class="clearfix">		            
    <div class="container exam-view">
    	<div class="hider alert alert-danger" id="please_ansewer_all"><span class="alert-content">رجاء اجب على جميع الاسئلة</span></div>
<?php 
if(isset($_POST['submit'])){
	require("exam_correct.php");
}else{
?>
<form action="<?php echo $GLOBALS['domain'];?>exam/<?php echo $exam_id;?>" method="post" class="exam-form" onsubmit="return false , submit_exam()">

  <?php
	$ques_counter = 1; 
	$query_ques="SELECT * FROM `question` WHERE `exam_id`='$exam_id'";
	$res_ques=mysqli_query($GLOBALS['connection'],$query_ques);
	while($row=mysqli_fetch_assoc($res_ques))
	{
		$question_text=$row['question'];
		//$true_answer_id=intval($row['answer_id']);
		$question_id=intval($row['question_id']);
		$img_link=null;
		if(isset($row['img']) && !empty($row['img'])){
			$img_link = $GLOBALS['files_domain'].'questions/'.$question_id.'.png';
		}
		?>
		<h2 class="bordered light"><span class="question question_lbl_<?php echo $question_id; ?>">
			<?php echo $ques_counter." - ".$question_text; ?>
			</span>
			<input type="hidden" name="qd" class="qd" id="<?php echo $question_id; ?>">
			</h2>
			         <div class="row">	

			<div class="col-md-6 question-img">
				<?php
					//<!-- if question have image -->
					if(isset($img_link) && !empty($img_link)){
					 echo '<img src="'.$img_link.'">';
					}
				    //<!-- END if question have image -->
			    ?>
				
			</div>		
	

	<div class="col-md-6 question-answers">
		
	<ul class="list-unstyled medicom-feature-list">
	<?php
	$query_answer="SELECT * FROM answer WHERE question_id='$question_id'";
	$answer_result=mysqli_query($GLOBALS['connection'],$query_answer);
	if(mysqli_num_rows($answer_result)>0)
			{
				while($row=mysqli_fetch_assoc($answer_result))	
				{
				$answer_text=$row['answer'];
				$answer_id=$row['answer_id'];
				//echo $answer_id."  ".$answer_text."   ";
	?>

	<!-- start answers -->
	<li>
	<label class="q-ans-span question_id_<?php echo $question_id; ?>" for="ans_id_<?php echo $answer_id; ?>_q_<?php echo $question_id; ?>">
		<i class="fa fa-check-x medicom-check ans-i-<?php echo $answer_id; ?>"></i>
		<span class="ans_<?php echo $answer_id; ?>"><?php echo $answer_text;?></span>
		<input type="radio" name="question_id_<?php echo $question_id; ?>" id="ans_id_<?php echo $answer_id; ?>_q_<?php echo $question_id; ?>" class="q-ans-radio" value="<?php echo $answer_id; ?>" onchange="select_answer(<?php echo $question_id; ?>,<?php echo $answer_id; ?>);">
	</label>
	</li>
	<?php


			}
		}	

	?>
	</ul>
		
	</div>
		</div>
		<?php
		$ques_counter++;

	}


?>
	<div class="submiter">
				<button type="submit" class="btn btn-success" name="submit" value="222">
				<i class="fa fa-save"></i>
				 ارسال وانهاء
				</button>
			</div>
		</form>
<?php } ?>
    </div>
</div>
<?php 
}else{goto EndShowRes;}
}else{goto EndShowRes;}
}else{goto EndShowRes;}
}else{
	EndShowRes:
	redir($GLOBALS['domain'].'result/'.$exam_id,0);
}
?>