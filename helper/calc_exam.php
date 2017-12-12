<?php
if (!function_exists('calc_exam')){
function calc_exam($start_date , $end_date){
	$status = null;
    $status_message='<span class="label label-sm label-warning">وقت الامتحان غير محدد</span>';     
	if(isset($start_date) && !empty($start_date) && isset($end_date) && !empty($end_date)) {
	$start_time=intval(strtotime($start_date));
    $end_time= intval(strtotime($end_date));
    $current_date= date("Y-m-d",time());
    if(isset($start_date) && !empty($start_date) && isset($end_date) && !empty($end_date)) {
         if($end_time < time()){
             $status_message='<span class="label label-sm label-primary">نموذج الاجابة ظاهر</span';
             $status = "answers";
         }else{
            if($start_time < time()){
              $status_message='<span class="label label-sm label-success">ظاهر  للطلاب</span>';
              $status = "exam";
            }else{
              $status_message='<span class="label label-sm label-success">سيظهر للطلاب فى تاريخ البداية</span>';
              $status = "later";
            }
         }
    }else{
        
        // if($status==0){
        //     // it means that the exam is hidden
        //    $status_message='<span class="label label-sm label-danger">لا يراه الطلاب</span';
        // }
        // else if ($status==1)
        // {
        // // it means that the exam is shown
        //  $status_message='<span class="label label-sm label-success">ظاهر  للطلاب</span>';
        // }
        // else if($status==2)
        // {
        // // it means that the answers are shown
        //  $status_message='<span class="label label-sm label-primary">نموذج الاجابة ظاهر</span';
        // }
    }
	}
    return array("status" => $status , "message" => $status_message);
}
}

?>