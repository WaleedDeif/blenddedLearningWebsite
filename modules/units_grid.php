<?php require('../helper/calc_exam.php'); ?>
<div id="sub-page-content" class="clearfix">


<div class="container units-grid">
    
    <!-- <div class="row unit-row"> -->
         <?php 
         $subj_query = "SELECT `unit_id`, `title` FROM `unit` WHERE `status`= '1'{$limit_units}"; 
         $subj_result= mysqli_query($GLOBALS['connection'],$subj_query); 
         if(mysqli_num_rows($subj_result)>0)
         {
            while ($subj_data= mysqli_fetch_assoc($subj_result)) {
            $subj_id = $subj_data['unit_id'];
            $subj_title = $subj_data['title'];
            $unit_link = $GLOBALS['domain'].'unit/'.$subj_id;
            ?>


         
        <div class="padding-bottom-60 unit-view clearfix">
            
            <div class="doctors-img">
            <a href="<?php echo $unit_link;  ?>"><img src="<?php echo $site_data; ?>images-list/dna-icon-1.jpg" title=""></a>
                <ul class="list-unstyled social2"> </ul>
            </div>
            
            <div class="doctors-detail">
                <h4><a href="<?php echo $unit_link;   ?>"><?php echo  $subj_title ;  ?></a></h4>
                <?php 
            $file_query = "SELECT `unit_files`.`status` AS 'file_status', `unit_files`.`type` AS 'type' , `unit_lesson`.`unit_id` , `unit_lesson`.`status` AS 'lesson_status' , `unit_lesson`.`lesson_id` , `unit_files`.`lesson_id` FROM `unit_lesson` , `unit_files` WHERE `unit_lesson`.`lesson_id` = `unit_files`.`lesson_id` AND `unit_lesson`.`unit_id` = '{$subj_id}' AND `unit_files`.`status` = '1' AND `unit_lesson`.`status` = '1'";
            $file_result = mysqli_query($GLOBALS['connection'],$file_query);
            $file_counter = "-";$video_counter = "-";$lessons_counter = "-";
            if(mysqli_num_rows($file_result)>0 )
             {
              $file_counter = 0;
              $video_counter=0;
              while ($file_data= mysqli_fetch_assoc($file_result))
              {
                if($file_data['type']== 'ytb')
                 $video_counter++;
               else 
                $file_counter++;
              } 
                 // if($file_counter >0 )
                  
                // else 
                //   echo   '<p><label class="heading">لا توجد ملفات</label></p>';
                   // if($video_counter >0 )

                // else 
                //   echo   '<p><label class="heading">لا توجد فيديوهات</label></p>';
              }

              $lsns_sq = "SELECT `unit_id` , `status` FROM `unit_lesson` WHERE `unit_id` = '{$subj_id}' AND `status` = '1'";
              $lsns_q = mysqli_query($GLOBALS['connection'],$lsns_sq);
              if($lsns_q){
                $lsnsCntr = mysqli_num_rows($lsns_q);
                if($lsnsCntr > 0){$lessons_counter = $lsnsCntr;}
              }
              


                    echo '<p><label class="heading">الدروس</label><label class="detail">'.$lessons_counter.'</label></p>';
                    echo '<p><label class="heading">الملفات</label><label class="detail">'.$file_counter.'</label></p>';
                    echo '<p><label class="heading">الفيديوهات</label><label class="detail">'.$video_counter.'</label></p>';

                ?>
             <?php    $exam_query = "SELECT `exam_id` , `start_date` , `end_date` , `unit_id` FROM `exam` WHERE `unit_id`='{$subj_id}'";
            $exam_result = mysqli_query($GLOBALS['connection'],$exam_query);
            if(mysqli_num_rows($exam_result)>0)
         {
          $exam_counter = 0;

          while ($exam_data= mysqli_fetch_assoc($exam_result)) {
            $calc_exam = calc_exam($exam_data['start_date'],$exam_data['end_date']);
            $calc_exam_status = $calc_exam['status'];
             if($calc_exam_status === "answers" || $calc_exam_status === "exam"){
                $exam_counter++;
             }
          }
                ?>
                <p><label class="heading">الاختبارات</label><label class="detail"><?php echo $exam_counter;?> </label></p>
                <?php 
              }else {
                // echo '<p><label class="heading">لا توجد احتبارات </label><label class="detail">';
                echo '<p><label class="heading">الاختبارات</label><label class="detail">-</label></p>';
              }
                ?>
                
                
                <p class="show-unit"><a href="<?php echo $unit_link; ?>">عرض الموضـوع</a></p>
            </div>
            
        </div>
         <?php  
         }
         }
?>

        
    </div>
<?php echo $add_after_units_grid; ?>
</div>