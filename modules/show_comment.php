	<?php
$comment_query = " SELECT `post_id` , `comment_id` , `comment`, `student_id`,`date` FROM `comment` where `post_id`= '{$post_id}' ORDER BY `comment_id` DESC";
							$comment_result = mysqli_query($GLOBALS['connection'],$comment_query); 
							if(mysqli_num_rows($comment_result) > 0){ ?>
<h2 class="bordered light">التعليقات <span></span></h2>
<ol class="commentlist">
<?php
 

while($comment_data = mysqli_fetch_assoc($comment_result))
{
$comment_avatar = $site_data.'images/avator.jpg';
$comment= $comment_data['comment'];
$comment_id = $comment_data['comment_id'];
$commenter_id =$comment_data['student_id'];
if(isset($_GET['commenter_id']) && !empty($_GET['commenter_id']) && isset($_GET['delete_comment']) && 					$_GET['delete_comment']=='1' && isset($_GET['comment_id']) && !empty($_GET['comment_id']) )
if(sha1($commenter_id)==scr($_GET['commenter_id']) && $comment_id==$_GET['comment_id']){
$get_commenter_id=scr($_GET['commenter_id']);
$get_comment_id=scr($_GET['comment_id']);
$delete_query= "DELETE FROM `comment` WHERE `comment_id`= '$get_comment_id'";
$delete_result = mysqli_query($GLOBALS['connection'],$delete_query); 
echo "<div class='alert alert-danger' > تم حذف التعليق</div>"; 
continue;
}
$post_id = $comment_data['post_id'];
$comment_date = strtotime($comment_data['date']); 
$comment_data_am_pm = (date('a',$comment_date) == "am") ? 'صباحا' : 'مساءا';

if(!isset($commenter_id) || empty($commenter_id)){
				$user_query= "SELECT `name` FROM `user` where 1  ";
				$comment_avatar = $GLOBALS['files_domain'].'public/noubysaleh.jpg';
			} else {
				$user_query= "SELECT `name` FROM `student` where student_id='$commenter_id'  ";
			}
			$user_result = mysqli_query($GLOBALS['connection'],$user_query); 
			if(mysqli_num_rows($user_result)==1)
			{
				$user_data = mysqli_fetch_assoc($user_result);
				$user_name = $user_data['name']; 

			}
				
?>	
		<li class="comment">
			<article class="comment-wrapper clearfix"> 
				<div class="comment-avartar">
					<img alt="" src="<?php echo $comment_avatar; ?>" height="75" width="78">
				</div>

				<div class="comment-content-wrapper clearfix">
				   
					<div class="comment-head">
						<span class="comment-author"><?php echo $user_name ; 
						 ?></span>
						<span class="comment-date arabic-number">
						<?php
							// echo date('Y-m-d h:m',strtotime($comment_date)) ;
							 if($commenter_id===$_SESSION['student_id'])
						echo '<a href="'.$GLOBALS['domain'].'post/'.$post_id.'/?delete_comment=1&comment_id='.$comment_id.'&commenter_id='.sha1($commenter_id).'">حذف التعليق</a>'; 
							echo date('d',$comment_date).'-'.arabic_month($date).'-'.date('Y',$comment_date).' '.date('h:m',$comment_date);
							echo '&nbsp;'.$comment_data_am_pm;
						?> </span>
					</div>

					<div class="comment-message">
						<?php echo $comment ; ?>
					</div>                        
				</div>
				
			</article>
			
		</li>
<?php 
}
?>
	</ol>
	<?php 
		} else {?>
							<h2 class="bordered light">لا توجد تعليقات حتي الأن  <span></span></h2>


							<?php } ?>