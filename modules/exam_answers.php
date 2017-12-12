<?php 
	$exam_query="SELECT `title` FROM `exam` WHERE `exam_id`='$exam_id'";
	$exam_result=mysqli_query($GLOBALS['connection'],$exam_query);
	if(mysqli_num_rows($exam_result)>0)
	{
		$row=mysqli_fetch_assoc($exam_result);
		$exam_title=$row['title'];

?>

<section class="sub-page-banner dna-cover dna-cover-2 text-center" data-stellar-background-ratio="0.6">
    <div class="overlay"></div>
    
    <div class="container">
        <h1 class="entry-title">نموذج إجابة <?php echo $exam_title;?></h1>
    </div>
    
</section>


 <div id="sub-page-content" class="clearfix">		            
    <div class="container exam-view">
    	<div class="hider alert alert-danger" id="please_ansewer_all"><span class="alert-content">رجاء اجب على جميع الاسئلة</span></div>
 
  <?php

/// view questions and 
$query_ques="SELECT * FROM `question` WHERE `exam_id`='{$exam_id}'";
$res_ques=mysqli_query($GLOBALS['connection'],$query_ques);
$question_num=mysqli_num_rows($res_ques);

if($question_num>0)
{
	$ques_counter = 1; 
	while($row=mysqli_fetch_assoc($res_ques))
	{
		$question_text=$row['question'];
		//$true_answer_id=intval($row['answer_id']);
		$question_id=intval($row['question_id']);
		$default_answer=intval($row['answer_id']);
		$img_link=null;
		if(isset($row['img']) && !empty($row['img'])){
			$img_link = $GLOBALS['files_domain'].'questions/'.$question_id.'.png';
		}
		// view qusestions
		//echo $question_id."    ".$question_text."    ".$true_answer_id."<br>";
		?>
		<h2 class="bordered light"><span class="question question_lbl_<?php echo $question_id; ?>">
		 <?php echo $ques_counter." - ".$question_text; ?>
		</span>
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
$query_answer="SELECT * FROM answer WHERE `question_id`='{$question_id}'";
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
<label class="q-ans-span">
	<i class="fa<?php if($default_answer == $answer_id){echo ' fa-check';} ?> medicom-check"></i>
	<span><?php echo $answer_text;?></span>
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
}

?>  <div class="submiter">
    	<a class="btn btn-success" href="<?php echo $GLOBALS['domain'].'result/'.$exam_id; ?>">عرض النتيجة</a>
    	<a class="btn btn-info" href="<?php echo $GLOBALS['domain'].'exam/'.$exam_id; ?>/answers">عرض اجاباتى</a>
    </div>
    </div>
</div>
<?php } ?>