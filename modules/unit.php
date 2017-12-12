<?php
if(isset($GLOBALS['get_page_all'][1]) && !empty($GLOBALS['get_page_all'][1])){
	$unit_id = scr($GLOBALS['get_page_all'][1]);
	if(is_numeric($unit_id)){
		$unit_link = $GLOBALS['domain'].'unit/'.$unit_id.'/';
		$quu="SELECT * FROM `unit` WHERE `unit_id`= '{$unit_id}' AND `status` = '1' LIMIT 1";
	 	$quu_result=mysqli_query($GLOBALS['connection'],$quu);
	 	if($quu_result){
	 		if(mysqli_num_rows($quu_result) > 0){
				if(!isset($_SESSION['unit_covers'][$unit_id]) || empty($_SESSION['unit_covers'][$unit_id])){
					setRandomUnitCover:
					$set_random_cover = rand(1,12);
					foreach ($_SESSION['ucovs'] as $key_cover => $random_value) {if($random_value == $set_random_cover){goto setRandomUnitCover;break;}}
				    $_SESSION['unit_covers'][$unit_id] = $set_random_cover;
				}
				$random_cover = $_SESSION['unit_covers'][$unit_id];
				$allowed_unit_modules = array('books','slides','exam','forum','video');
				$unit_module = $allowed_unit_modules[0];
				if(isset($GLOBALS['get_page_all'][2]) && !empty($GLOBALS['get_page_all'][2])){
					$get_module = scr($GLOBALS['get_page_all'][2]);
					if(in_array($get_module, $allowed_unit_modules)){$unit_module = $get_module;}
				}
				

				$row=mysqli_fetch_assoc($quu_result);
				$unit_title=$row['title'];
				?>
				<div id="sub-page-content" class="clearfix unit-page">
				<section class="full-cover unit-cover medicom-awesome-features-sec" data-stellar-background-ratio="0.3" style="background: url('<?php echo $site_data; ?>images-list/full-cover-<?php echo $random_cover; ?>.jpg')">
				<div class="unit-page-overlay"></div>
				<div class="container unit-links">

				

					<ul class="unit-links-left awesome-features list-unstyled pull-left text-right">
						<li><a href="<?php echo $unit_link.'exam';?>"><i class="pull-right img-circle fa fa-newspaper-o"></i><span>الاختبارات</span><!-- write text under title --></a></li>
						<li class="middle"><a href="<?php echo $GLOBALS['domain'].'forum/'.$unit_id;?>"><i class="pull-right img-circle fa fa-users"></i><span>المنتدى</span></a></li>
						<li><a href="<?php echo $GLOBALS['domain'].'units';?>"><i class="pull-right img-circle fa fa-tasks"></i><span>الموضوعات</span></a></li>
						</ul>

						<div class="unit-links-center dna-icon-png text-center">
							   <h1 class="light unit-page-title"><span><?php echo $unit_title;?></span></h1>
						</div>

						<ul class="unit-links-right awesome-features list-unstyled pull-right text-left">
						<li><a href="<?php echo $unit_link.'books';?>"><i class="pull-left img-circle fa fa-file-pdf-o"></i><span>الكتب الالكترونية</span></a></li>
						<li class="middle"><a href="<?php echo $unit_link.'slides';?>"><i class="pull-left img-circle fa fa-file-powerpoint-o"></i><span>العروض التقديمية</span></a></li>
						<li><a href="<?php echo $unit_link.'video';?>"><i class="pull-left img-circle fa fa-file-video-o"></i><span>الفيديوهات</span></a></li>
					</ul>

				</div>

				</section>
				<br>
				<div class="container unit-module">
				<?php
					require("unit_{$unit_module}.php");
				?>
				</div>
				</div>
				<?php
	 		}else{goto NoUnit;}
	 	}else{goto NoUnit;}
	 }else{goto NoUnit;}
}else{
	NoUnit:
	redir($GLOBALS['domain'].'units',0);
}
?>