<?php 
if(isset($_POST['comment_text']) && !empty($_POST['comment_text'])){
$comment_text= scr(trim($_POST['comment_text'])); 
$commenting_student_id = $_SESSION['student_id'];
$comment_query = "INSERT INTO `comment` (`comment`,`student_id`,`post_id`,`date`)VALUES('$comment_text','$commenting_student_id','$post_id',CURRENT_TIMESTAMP)"; 
$comment_result = mysqli_query($GLOBALS['connection'],$comment_query);  
}
?>