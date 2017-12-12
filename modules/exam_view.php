<?php
 require("exam_script.php");
	$exam_query="SELECT `title` FROM exam WHERE exam_id='$exam_id'";
	$exam_result=mysqli_query($GLOBALS['connection'],$exam_query);
	if(mysqli_num_rows($exam_result)>0)
	{
		$row=mysqli_fetch_assoc($exam_result);
		$exam_title=$row['title'];
	}

?>

<section class="sub-page-banner dna-cover dna-cover-4 text-center" data-stellar-background-ratio="0.6">
    <div class="overlay"></div>
    
    <div class="container">
        <h1 class="entry-title"><?php echo $exam_title;?></h1>
    </div>
    
</section>


 <div id="sub-page-content" class="clearfix">		            
    <div class="container exam-view">
    	<div class="hider alert alert-danger" id="please_ansewer_all"><span class="alert-content">رجاء اجب على جميع الاسئلة</span></div>
<form action="<?php echo $GLOBALS['domain'];?>index.php?page=exam&exam_id=<?php echo $exam_id;?>" method="post" class="exam-form" onsubmit="return false , submit_exam()">

  <?php

/// view questions and 
$query_ques="SELECT * FROM question WHERE exam_id='$exam_id'";
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
		$img_link=$row['img'];
		// view qusestions
		//echo $question_id."    ".$question_text."    ".$true_answer_id."<br>";
		require("view_ques.php");
		require("view_answers.php");
		$ques_counter++;

	}
}

?>
	<div class="submiter">
				<button type="submit" class="btn btn-success" name="submit" value="222">
				<i class="fa fa-save"></i>
				 ارسال وانهاء
				</button>
				<?php 
				if(isset($_POST['submit']))
				{
					require("exam_correct.php");
				}
				?>
			</div>
		</form>
    </div>
</div>