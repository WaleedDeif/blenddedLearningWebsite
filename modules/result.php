<section class="sub-page-banner dna-cover dna-cover-4 text-center" data-stellar-background-ratio="0.6">

<div class="overlay"></div>

<div class="container">
    <h1 class="entry-title">نتــائج الامتحانات</h1>
</div>

</section>

<?php 
$results_query="SELECT * FROM `student_result` WHERE `student_id`= '{$student_id}' ";
$results_result=mysqli_query($GLOBALS['connection'],$results_query);
if($results_result){
	if(mysqli_num_rows($results_result)>0){
		require($GLOBALS['helper']."arabic_date.php");
		?>
		<section class="container">
	<div class="row">
		<div class="col-md-12 module-list module-result">
		    <ul class="list-unstyled pricing-table first">
		    <li class="table-heading">
						<span>اسم الامتحان</span>
				<span class="text-right">النتيجة</span>
				<span class="text-right">وقت الاختبار</span>
				<span class="text-right">نموذج الاجابة</span>
			</li>
		    		<?php 
				  $results_result=mysqli_query($GLOBALS['connection'],$results_query); 
				 $count=0;
				 $total=0;
					while($row=mysqli_fetch_assoc($results_result))	
					{
					$count++;
						
						$exam_answers_status = '<label class="label label-default ">نموذج الاجابة لم يظهر بعد</label>';
						$exam_id=$row['exam_id'];
						$student_result= round(doubleval($row['result']),4) * 100;
						$total+=$student_result;
						$exam_title_q="SELECT `title` , `exam_id` , `end_date` FROM `exam` WHERE `exam_id`='{$exam_id}' LIMIT 1";
						$exam_title_qq=mysqli_query($GLOBALS['connection'],$exam_title_q);
						$rowq=mysqli_fetch_assoc($exam_title_qq);
						$exam_time =  $row['date'];
						$exam_time_stamp = strtotime($exam_time);
						$exam_time = date("d",$exam_time_stamp).' '.arabic_month($exam_time_stamp).' - '.date('Y',$exam_time_stamp);//.' '.date('h:i',$exam_time_stamp);
						$exam_title=$rowq['title'];
						$exam_end_date = strtotime($rowq['end_date']);
						if($exam_end_date < time()){
							$exam_answers_status = '<a href="'.$GLOBALS['domain'].'exam/'.$exam_id.'" class="label-is-link label label-success ">عرض نموذج الاجابة</a>';	
						}
						$exam_answers_status_view  = '<a href="'.$GLOBALS['domain'].'exam/'.$exam_id.'/answers" class="label-is-link label label-info ">عرض اجاباتى</a>';
						echo'<li class="list-light exam-res">';
							echo'<span><a> '.$exam_title.'</a></span>';
							echo'<span class="text-right">'.$student_result.' % </span>';
							echo'<span class="text-right">'.$exam_time.'</span>';
							echo'<span class="text-right">'.$exam_answers_status_view.'&nbsp;'.$exam_answers_status.'</span>';
						echo'</li>';
					}
					$total=$total/$count;
					echo'<span class="text-right"><b> نتيجتك التراكمية حتى الان هى :-  </b>'.$total.'&nbsp; % <br>.</span>';

					
				?>
			</ul> 
		</div>
	</div>
	</section>
	<?php
	}else{goto NoResultYet;}
}else{
	NoResultYet:
	echo '<section class="services-sec container topic-list-1"><div class="text-center alert alert-info">لا توجد لك نتائج ظاهرة حتى الان , ترقب قريبا فور انتهاء مدة أول اختبار لك</div></section>';
}
?>
<div class="clearfix"></div>
