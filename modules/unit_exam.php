<?php require($GLOBALS['helper'].'calc_exam.php'); ?>
<h2 class="bordered light"><span>الاختبارات</span></h2>


<div class="row">
	<div class="col-md-12 module-list module-exam">
		<ul class="list-unstyled pricing-table first">
			
				<?php 
		// showing the exam 
		$exam_query="SELECT `unit_id` , `exam_id` , `start_date` , `end_date` , `title` FROM `exam` WHERE `unit_id`='{$unit_id}' AND  `start_date` IS NOT NULL AND  `end_date` IS NOT NULL ORDER BY `end_date` ASC ";
		$exam_result=mysqli_query($GLOBALS['connection'],$exam_query);
		// echo mysqli_num_rows($exam_result);
		if($exam_result){
		 if(mysqli_num_rows($exam_result)>0){
			echo'<li class="table-heading">
				<span>اسم الامتحان</span>
				<span class="text-right">تاريخ البداية</span>
				<span class="text-right">تاريخ الانتهاء</span>
			</li>';
			while($row=mysqli_fetch_assoc($exam_result))	
			{	$exam_id = $row['exam_id'];
				$calc_exam = calc_exam($row['start_date'],$row['end_date']);
	            $calc_exam_status = $calc_exam['status'];
	             if($calc_exam_status === "answers" || $calc_exam_status === "exam"){
	                $end_date=$row['end_date'];
					$exam_title=$row['title'];
					$start_date = $row['start_date'];
					echo'
					<li class="list-light">
					<span><a href="'.$GLOBALS['domain'].'exam/'.$exam_id.'">'.$exam_title.'</a></span>
					<span class="text-right">'.$start_date.'</span>
					<span class="text-right">'.$end_date.'</span>
				</li>';
	             }
				
			}
		}else{
			 echo '<div class="alert alert-info">لا توجد امتحانات فى هذا الموضوع حتى الان</div>';
		}	
		}else{

		}
		?>
		</ul>
	</div>
</div>

<div class="clearfix"></div>