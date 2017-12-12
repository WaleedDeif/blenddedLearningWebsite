<div class="row">
<?php
$open_lesson_id = null;
$lessons_num = 0;
$lessons_sql = "SELECT * FROM `unit_lesson` WHERE `unit_id` = '{$unit_id}' AND `status` = '1'";
$lessons_q = mysqli_query($GLOBALS['connection'],$lessons_sql);
if($lessons_q){
	$lessons_num = mysqli_num_rows($lessons_q);
}

if($lessons_num == 0){
	echo '<div class="col-md-12 module-list module-slides"><h2 class="bordered light"><span>العروض التقديمية</span></h2><div class="alert alert-info">لا يوجد دروس أو عروض تقديمية فى هذا الموضوع حتى الان</div></div>';
}else{
echo '<div class="col-md-9 module-list module-slieds"><h2 class="bordered light"><span class="mod-title-lesson-adder">العروض التقديمية</span></h2>';
if(isset($GLOBALS['get_page_all'][3]) && !empty($GLOBALS['get_page_all'][3])){
	$open_lesson_id = scr($GLOBALS['get_page_all'][3]);
	if(is_numeric($open_lesson_id)){
		STartDefaultLesson:
		$sllsn = "SELECT * FROM `unit_lesson` WHERE `unit_id` = '{$unit_id}' AND `status` = '1' AND `lesson_id` = '{$open_lesson_id}' LIMIT 1";
		$sllsn_q = mysqli_query($GLOBALS['connection'],$sllsn);
		if($sllsn_q){
			if(mysqli_num_rows($sllsn_q) > 0){
				$lesson_open = mysqli_fetch_assoc($sllsn_q);
				$lesson_title = $lesson_open['title'];
				echo '<script type="text/javascript">$(".mod-title-lesson-adder").append(" - '.$lesson_title.'");</script>';
				$sql_files = "SELECT * FROM `unit_files` WHERE `status` = '1' AND `lesson_id` = '{$open_lesson_id}' AND (`type` = 'ppt' || `type` = 'pot' || `type` = 'pps' || `type` = 'pptx' || `type` = 'ppsx')";
				$q_files = mysqli_query($GLOBALS['connection'],$sql_files);
				if($q_files){
					if(mysqli_num_rows($q_files) > 0){
						echo '<ul class="list-unstyled medicom-feature-list">';
						while($files_in_module = mysqli_fetch_assoc($q_files)){
							$file_id = $files_in_module['unit_files_id'];
							$file_title = $files_in_module['title'];
							$file_key = $files_in_module['fkey'];
							$file_type = $files_in_module['type'];
							$download_link = download_link("uploads",$file_key.'.'.$file_type,"noubysaleh.com-{$unit_title}-{$lesson_title}-".$file_title.'.'.$file_type,$_SESSION['student_username']);
							echo '<li><i class="fa fa-file-powerpoint-o medicom-check"></i><a href="'.$download_link.'" target="_blank">'.$file_title.' <i class="fa fa-download download-icon"></i></a></li>';
						}
						echo '</ul>';
					}else{goto NoFilesHere;}
				}else{
					NoFilesHere:
					echo '<div class="alert alert-warning">لا يوجد عروض تقديمية فى هذا الدرس</div>';
				}
			}else{goto PleaseChooseLesson;}
		}else{goto PleaseChooseLesson;}
	}else{goto PleaseChooseLesson;}
}else{
	$dflessons_sql = "SELECT * FROM `unit_lesson` WHERE `unit_id` = '{$unit_id}' AND `status` = '1' ORDER BY `lesson_id` ASC LIMIT 1";
	$dflessons_q = mysqli_query($GLOBALS['connection'],$dflessons_sql);
	if($dflessons_q){
		if(mysqli_num_rows($dflessons_q) > 0){
			$dflsn = mysqli_fetch_assoc($dflessons_q);
			$defailt_lsnid = $dflsn['lesson_id'];
			if(isset($defailt_lsnid)){$open_lesson_id = $defailt_lsnid;goto STartDefaultLesson;}
		}
	}
	PleaseChooseLesson:
	echo '<div class="alert alert-danger">رجاء اختيار الدرس لعرض العروض التقديمية</div>';
}
echo "</div>"; 
?>
	<div class="col-md-3 unit-lessons">
		 <div class="pricing-table2 highlight">
			<div class="table-heading">
				<?php /*<p class="price"><strong><?php echo $lessons_num; ?></strong></p>*/ ?>
				<h3>الدروس</h3>
			</div>
			<ul class="list-unstyled">
				<?php
					if($lessons_num > 0){
						while($lesson=mysqli_fetch_assoc($lessons_q)){
							$lesson_id = $lesson['lesson_id'];
							$lesson_title = $lesson['title'];
							echo '<li';if($open_lesson_id == $lesson_id){echo ' class="active"';}
							echo '><a href="'.$unit_link.$unit_module.'/'.$lesson_id.'">'.$lesson_title.'</a></li>';
						}
					}
				?>
			</ul>
 		</div> 
	</div>
<?php
}
?>
</div>


