<?php 
$student_id = $_SESSION['student_id'] ; 
$makesure_query = " SELECT `student_id` FROM `student` WHERE `student_id`= $student_id AND `status` = 0 "; 
$result = mysqli_query($GLOBALS['connection'] ,$makesure_query); 
if($result== true){
if( mysqli_num_rows($result)===1 ) {
require("modules/logout.php");
die();
}
}
?>