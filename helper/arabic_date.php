<?php 
function arabic_month($time_stamp){
$month_value = date('n',$time_stamp); 
if($month_value==1){
$month = "يناير";	
}else if($month_value==2){
$month= "فبراير";
}
else if($month_value==3){
$month= "مارس";
}
else if($month_value==4){
$month= "أبريل";
}
else if($month_value==5){
$month= "مايو";
}
else if($month_value==6){
$month= "يونيو";
}
else if($month_value==7){
$month= "يوليو";
}
else if($month_value==8){
$month= "أغسطس";
}
else if($month_value==9){
$month= "سبتمبر";
}else if($month_value==10){
$month= "أكتوبر";
}else if($month_value==11){
$month= "نوفمبر";
}else if($month_value==12){
$month= "ديسمبر";
}else{
	$month=""; 
}
return $month ;
}
?>