<?php
$is_correct=false;
			// fetching the whole answers
		//////////////////////////			
$query_whole_answer="SELECT * FROM answer WHERE question_id='$question_id'";
$answer_result_whole=mysqli_query($GLOBALS['connection'],$query_whole_answer);
if(mysqli_num_rows($answer_result_whole)>0)
		{
			while($row=mysqli_fetch_assoc($answer_result_whole))	
			{
			$answer_text=$row['answer'];
			$answer_id=$row['answer_id'];
			///////////////////////////////

			// fetching the chosen answer
			///////////////////////////////
			
			$query_answer="SELECT answer_id FROM question WHERE question_id='$question_id' && exam_id='$exam_id'";
			$answer_result=mysqli_query($GLOBALS['connection'],$query_answer);
			if(mysqli_num_rows($answer_result)==1)
			{
			$row2=mysqli_fetch_assoc($answer_result);
			$correct_answer_id=$row2['answer_id'];
			}
			//////////////////////////////

// here i have to know which answer were selected to make it selected
if($answer_id==$correct_answer_id){$is_correct=true;}
else {$is_correct=false;}

	
?>
<div class="col-md-6 question-answers">
	
<ul class="list-unstyled medicom-feature-list">
<!-- start answers -->
<li>
<label class="q-ans-span question_id_<?php echo $question_id; ?>" for="ans_id_<?php echo $answer_id; ?>_q_<?php echo $question_id; ?>">
<i class="<?php if($is_correct){echo "fa fa-check medicom-check ans-i-";}else {echo "fa fa-check-x medicom-check ans-i-";}  echo $answer_id; ?>"></i>
	<span class="ans_<?php echo $answer_id; ?>" ><?php echo $answer_text;?></span>
	<input type="radio" name="question_id_<?php echo $question_id; ?>" id="ans_id_<?php echo $answer_id; ?>_q_<?php echo $question_id; ?>" class="q-ans-radio" onchange="select_answer(<?php echo $question_id; ?>,<?php echo $answer_id; ?>);" <?php echo "disabled"?>>
</label>
</li>
</ul>
	
</div>
<?php


		}
	}	

?>
