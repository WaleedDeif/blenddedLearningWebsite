<div class="col-md-8 posts-div blog-wrapper">
	
	<h2 class="light bordered"><span>منتدي  <?php  echo $unit_title;?> </span></h2>
<?php
include($GLOBALS['helper']."arabic_date.php");
$paper=1 ;  
if(isset($GLOBALS['get_page_all'][2]) && !empty($GLOBALS['get_page_all'][2])){
	$get_paper = scr($GLOBALS['get_page_all'][2]);
	if(is_numeric($get_paper)){
		$paper = ($get_paper > 0) ? $get_paper : $paper;
	}
}

$inpage = 10;
$sql_paper= ($paper-1)*$inpage; 
$num_query = "SELECT COUNT(`unit_id`) AS `num` FROM `post` WHERE `unit_id`='{$unit_id}'";
$num_result = mysqli_query($GLOBALS['connection'],$num_query);
$num_assoc = mysqli_fetch_assoc($num_result); 
$num_posts = $num_assoc['num'];
if($num_posts > 0){
$max_pages = ceil($num_posts/$inpage);

$feed_query = " SELECT `post_id` , `date` , `title`, `img`, `student_id`, `content` FROM `post` WHERE `unit_id`='$unit_id' AND `status`= 1  ORDER BY `post_id` DESC  LIMIT ".$sql_paper.",{$inpage} ";
$feed_result = mysqli_query($GLOBALS['connection'],$feed_query); 
?>

	<?php if(mysqli_num_rows($feed_result)>0){ 
		while($feed_data= mysqli_fetch_assoc($feed_result)){
		$post_id= $feed_data['post_id']; 
		$content = $feed_data['content'];
		$content = strip_tags($content);
		$content = htmlspecialchars($content);
		$content= mb_substr($content,0, 248	,'UTF-8').'.....';
		$student_id= $feed_data['student_id']; 
		$check_active_query = " SELECT `student_id` FROM `student` WHERE `student_id`= $student_id AND `status` = 0 ";
		$check_active_result = mysqli_query($GLOBALS['connection'],$check_active_query); 
		if(mysqli_num_rows($check_active_result)==1){
			continue ; 
		}
		$title= $feed_data['title'];
		$img = $feed_data['img']; 
		$date = $feed_data['date']; 
		$comment_query = "SELECT `comment_id` FROM `comment` WHERE `post_id`='$post_id'  "; 
		$comment_result = mysqli_query($GLOBALS['connection'],$comment_query);
		$num_comments = mysqli_num_rows($comment_result);
		$post_link = $GLOBALS['domain'].'post/'.$post_id;
	  ?>
		<article class="blog-item blog-full-width forum-post">
		
			<div class="blog-full-width-date" title="الساعة  <?php echo date('h:i  a',strtotime($date)); ?>">
				<p class="day arabic-number"><?php echo date('j',strtotime($date)); ?></p><p class="monthyear"><?php  echo arabic_month(strtotime($date)).'  <span class="arabic-number">'.date('Y',strtotime($date)); ?></span></p>
				<span class="posts-comments-number"><?php echo $num_comments; ?><i class="fa fa-comments"></i></span>
			</div>
			
			<div class="blog-content">
				<h4 class="blog-title"><a href="<?php echo $post_link; ?>"><?php echo $title ;  ?></a></h4>
				<?php 
				if(isset($img) && !empty($img)){
					$img_url = $GLOBALS['files_domain'].'posts/'.$post_id.'_200.'.$img;
				?> 

				<!-- If post have image print this div -->
				<div class="blog-thumbnail">
					<img alt="" src="<?php echo $img_url ;?> ">
				</div>
				<?php } ?>
				<!-- end post image -->

				<?php
				if(empty($student_id)){
					$by_class = "admin";
					$user_query= "SELECT `name` FROM `user` LIMIT 1 ";
				}else {
					$by_class = "user";
					$user_query= "SELECT `name` FROM `student` where student_id='$student_id'  ";
				}
				$user_result = mysqli_query($GLOBALS['connection'],$user_query); 
				if(mysqli_num_rows($user_result)==1)
				{
					$user_data = mysqli_fetch_assoc($user_result);
					$user_name = $user_data['name']; 

				}
				?>
			<p class="blog-meta">بواسطة: <a class="post-by-<?php echo $by_class; ?>"><?php echo $user_name;?></a></p>
				
				<p class="post-content">
					<?php 
						echo $content ; 
					?>
					<a href="<?php echo $post_link; ?>" class="read-more">إقرأ المزيد</a>
				</p>
			</div>
		</article>
	<?php }
}else{ ?>
<span style="display: block;width: 100%;" class="alert alert-info">هذه الصفحة غير موجودة</span>
	<?php
}

 ?>
		
	<?php
		if($max_pages > 1){
			$pagination_link = $GLOBALS['domain'].'forum/'.$unit_id.'/';
			?>
				<div class="text-center arabic-number">
		            <ul class="pagination custom-pagination">
		            	<?php
		            		$pagination_start = $paper - 4;
							$pagination_end = $paper + 4;
							$pagination_counter = 5;
							if($pagination_start < 1){$pagination_start = 1;}
							if($pagination_end >= $max_pages){
								$pagination_end = $max_pages;
							}
							$pagination_list = '';
							$pagination_list_array = array();
							for ($pagnt=$pagination_start; $pagnt <= $pagination_end; $pagnt++) { 
								$pagination_list .= '<li';
								if($pagnt == $paper){$pagination_list .= ' class="active"';}
								$pagination_list .= '><a href="'.$pagination_link.$pagnt.'">'.$pagnt.'</a></li>';
								$pagination_list_array[] = $pagnt;
							}

							if($paper > 1 && !in_array(1, $pagination_list_array)){
		            			$prev = $paper - 1;
		            			echo '<li><a href="'.$pagination_link.$prev.'">«</a></li>';
			            		echo '<li><a href="'.$pagination_link.'1">الصفحة الاولى</a></li>';
		            		}
		            		echo $pagination_list;
		             		if($paper < $max_pages && !in_array($max_pages, $pagination_list_array)){
		             			$next = $paper + 1;
			             			echo '<li><a href="'.$pagination_link.$max_pages.'">الصفحة الاخيرة</a></li>';
			             			echo '<li><a href="'.$pagination_link.$next.'">»</a></li>';
		            		}
		             	?>
		            </ul>
		        </div>
			<?php
		}
}else{ ?>
<span style="display: block;width: 100%;" class="alert alert-info">لا يوجد منشورات فى هذا المنتدى</span>
	<?php
}
	?> 
</div>

