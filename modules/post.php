<?php 
if(isset($GLOBALS['get_page_all'][1]) && !empty($GLOBALS['get_page_all'][1])){
	$post_id = scr($GLOBALS['get_page_all'][1]);
	
	if( is_numeric($post_id))
	{
		// here we add comments 
		if(isset($_POST['add_comment']))
		{
		include("new_comment.php"); 
		}
		include($GLOBALS['helper']."arabic_date.php");
		//here we fetch the data
		$post_query = "SELECT `title`,`unit_id`,`content`,`date`,`img`,`student_id`,`status` FROM post  WHERE `post_id`='$post_id' AND `status`=1 ";
		$post_result = mysqli_query($GLOBALS['connection'],$post_query);
		if(mysqli_num_rows($post_result)==1)
		{
			$post_data = mysqli_fetch_assoc($post_result);
			$title = $post_data['title']; 
			$unit_id = $post_data['unit_id']; 
			$content = $post_data['content']; 
			$student_id = $post_data['student_id'];
			$date = strtotime($post_data['date']); 
			$img = $post_data['img']; 

		}else
		{
			redir($GLOBALS['domain'].'index.php?page=units',0);
		} 
		///// here we show the subjects. 
		$unit_visible = false; 
$unit_query= "SELECT `title`,`unit_id` FROM unit WHERE status=1 "; 
$unit_result = mysqli_query($GLOBALS['connection'],$unit_query); 
if(mysqli_num_rows($unit_result)>0){
	while($u_data = mysqli_fetch_assoc($unit_result)){
		$unit_array[$u_data['unit_id']]= $u_data['title']; 
		if($u_data['unit_id']==$unit_id)
			$unit_visible= true ; 
	}
	if($unit_visible!=true)
	redir($GLOBALS['domain'].'index.php?page=units',0); 

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
					<div class="col-md-8 blog-wrapper clearfix">
							
							<h2 class="bordered light"><span><?php echo $title ; ?></span></h2>
							
							<article class="blog-item blog-full-width blog-detail post-view">
								<!-- If post have image print this div -->
								<?php if(isset($img) && !empty($img)){?>
								<div class="blog-thumbnail">
									<img alt="" src="<?php echo $GLOBALS['files_domain'].'posts/'.$post_id.'_800.'.$img; ?>">
								</div>
								<!-- If post have not image print this div -->
								<?php }?>
								<div class="blog-content">
									<p class="post-content">
										<?php echo $content ; ?>
									</p>
								</div>
									<?php
									if(isset($student_id) && !empty($student_id))
									{ 	
										$by_class = "user";
										$user_query = "SELECT `name`FROM `student` WHERE `student_id`=$student_id AND `status`=1";
									}else
									{	
										$by_class = "admin";
										$user_query = "SELECT `name`FROM `user` WHERE 1";

									}
										$user_result = mysqli_query($GLOBALS['connection'],$user_query);
										if(mysqli_num_rows($user_result)==1){
										$user_data = mysqli_fetch_assoc($user_result);
										$user_name = $user_data['name']; 

										}else {}
										
									?>
									
								<div class="share-post clearfix post-data">
									<span>بواسطة :<a class="post-by-<?php echo $by_class; ?>"><?php echo $user_name ;  ?></a></span>
									<span>المنتدى :<a href="<?php echo $GLOBALS['domain'].'forum/'.$unit_id ; ?>"><?php echo $unit_array[$unit_id] ; ?></a></span>
									<span>تاريخ :<a class="arabic-number">
									<?php
										// echo date("Y-m-d h-i a ",strtotime($date));
										echo date('j',$date).' - '.arabic_month($date).' - '.date('Y',$date);
									?></a></span>
								</div>
											
							</article>
							<?php 
						
								include("show_comment.php"); ?>
							<div class="comment-respond">
							
								<h2 class="bordered light"><span>أضف تعليق</span></h2>
								
								<form action="<?php echo $GLOBALS['domain'].'post/'.$post_id ;?>" method="post">
									<textarea name="comment_text" placeholder="أضف تعليقك هنا..."></textarea>
									<input type="submit" name='add_comment' class="btn btn-default" value="ارسال">
								</form>							
							</div>
							
						</div>
					


<!-- Start Units List -->
<?php require("forum_units.php"); ?>
<!-- End Units list -->


				</div>
</div>
<?php 
}else
{
	goto forum;
}

}else{
	forum:
	redir($GLOBALS['domain'].'forum',0);
}
?>
<script type="text/javascript">$(document).ready(function(){$(".menu-link-forum").addClass("active");});</script>