<?php
$unit_query= "SELECT `title`,`unit_id` FROM unit WHERE status=1 "; 
$unit_result = mysqli_query($GLOBALS['connection'],$unit_query); 
if(mysqli_num_rows($unit_result)>0){
	while($u_data = mysqli_fetch_assoc($unit_result)){
		$unit_array[$u_data['unit_id']]= $u_data['title'];
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
					<div class="col-md-8 posts-div blog-wrapper">
						
						<h2 class="light bordered"><span>عرض منشوراتى</span></h2>
<?php
$commenting_student_id = $_SESSION['student_id'];
$feed_query = " SELECT `post_id` , `date` , `title`, `img`, `student_id` FROM `post` WHERE `student_id`='{$commenting_student_id}' AND `status`=1 ORDER BY `post_id` DESC ";
$feed_result = mysqli_query($GLOBALS['connection'],$feed_query); 
?>

	<?php if(mysqli_num_rows($feed_result)>0){ 
		include($GLOBALS['helper']."arabic_date.php");
		while($feed_data= mysqli_fetch_assoc($feed_result)){
		$post_id= $feed_data['post_id']; 
		$title= $feed_data['title'];
		$img = $feed_data['img']; 
		$date = strtotime($feed_data['date']); 
		$comment_data_am_pm = (date('a',$date) == "am") ? 'صباحا' : 'مساءا';
		$edit_link = $GLOBALS['domain'].'my_posts/'.$post_id;
		$date = date('d',$date).'-'.arabic_month($date).'-'.date('Y',$date).' '.date('h:m',$date).' '.$comment_data_am_pm;
		 ?>

<ol class="commentlist">
	
		<li class="comment">
			<article class="comment-wrapper clearfix"> 
				<?php
					if(isset($img) && !empty($img)){
						echo '<div class="comment-avartar"><a href="'.$edit_link.'"><img alt="" src="'.$GLOBALS['files_domain'].'posts/'.$post_id.'_200.'.$img.'" height="75" width="78"></a></div>';
					}
				?>

				<div class="comment-content-wrapper clearfix">
				   
					<div class="comment-head">
						<span class="comment-author"><a href="<?php echo $edit_link; ?>"><?php echo $title; ?></a></span>
						<span class="comment-date arabic-number">
						<?php echo $date; ?> </span>
					</div>
				</div>
				
			</article>
			
		</li>
	

	</ol>

		 <?php
	}
}else{ ?>
<div class="alert alert-info">لم تتم اضافة اى منشورات</div>
<?php }
?>	

					</div>
					
<?php require("forum_units.php"); ?>


				</div>
</div>