<?php
$unit_id = null;$unit_array = array();
$units_sql= "SELECT * FROM `unit` WHERE `status`= '1'"; 
if(isset($GLOBALS['get_page_all'][1]) && !empty($GLOBALS['get_page_all'][1])){
	$get_unit_id = scr($GLOBALS['get_page_all'][1]);
	if(is_numeric($get_unit_id)){
		$unit_id = $get_unit_id;
	}else {goto firstUnit;}
}else { 
	firstUnit:
	$unit_resultx = mysqli_query($GLOBALS['connection'],$units_sql." ORDER BY `unit_id` ASC LIMIT 1"); 
	if(mysqli_num_rows($unit_resultx) > 0){
		$u_datax = mysqli_fetch_assoc($unit_resultx);
		$unit_id = $u_datax['unit_id'];
	}
}

if(isset($unit_id) && !empty($unit_id)){
	$unit_result = mysqli_query($GLOBALS['connection'],$units_sql." AND `unit_id` = '{$unit_id}' LIMIT 1"); 
	if(mysqli_num_rows($unit_result) > 0){
		$u_data = mysqli_fetch_assoc($unit_result);
		$unit_title = $u_data['title'];



		$unit_result_all_units = mysqli_query($GLOBALS['connection'],$units_sql." ORDER BY `unit_id` ASC"); 
		if(mysqli_num_rows($unit_result_all_units) > 0){
			while($u_data_all_units = mysqli_fetch_assoc($unit_result_all_units)){
				// $unit_id = $u_data_all_units['unit_id'];
				$unit_array[$u_data_all_units['unit_id']] = $u_data_all_units['title'];
			}
		}
?>	
<section class="sub-page-banner dna-cover dna-cover-5 text-center" data-stellar-background-ratio="0.6">
    
    <div class="overlay"></div>
    
    <div class="container">
        <h1 class="entry-title">المنتـدى</h1>
    </div>
    
</section>


<div id="sub-page-content" class="clearfix">
<div class="container forum-grid">
<?php 
require("forum_posts.php"); 
require("forum_units.php");
?>
</div>
</div>
<?php
	}
}else{
	GotoHome:
	redir($GLOBALS['domain'],0); 
}
?>