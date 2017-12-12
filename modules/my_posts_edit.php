<?php 
$img_label = "اختر صورة";$viw = '';
$post_id = $get_post_id;
// selcting visible units from the DB.
$unit_query= "SELECT `title`,`unit_id` FROM unit WHERE status=1 "; 
$unit_result = mysqli_query($GLOBALS['connection'],$unit_query); 
if(mysqli_num_rows($unit_result)>0){
	while($u_data = mysqli_fetch_assoc($unit_result)){
		$unit_array[$u_data['unit_id']]= $u_data['title'];
	}
}
$student_id = $_SESSION['student_id'];
$query = "SELECT * FROM `post` WHERE `post_id` = '{$post_id}' AND `student_id` = '{$student_id}' LIMIT 1";
$result= mysqli_query($GLOBALS['connection'],$query); 
if($result){
	if(mysqli_num_rows($result)){
		$post_data= mysqli_fetch_assoc($result); 
		$student_id= $post_data['student_id'];
		$content= $post_data['content'];
		$img= $post_data['img'];
		$title= $post_data['title'];
		$date= $post_data['date']; 
		$post_unit_id = $post_data['unit_id'];
		$comments_num = 0;
		$mod_link = $GLOBALS['domain']."index.php?mod=forum&page=edit&id={$post_id}&unit_id={$post_unit_id}";
		$comment_query = " SELECT `post_id` FROM `comment` where `post_id`= '{$post_id}'";
		$comment_result = mysqli_query($GLOBALS['connection'],$comment_query); 
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
						
						<h2 class="light bordered"><span>اضافة منشور</span></h2>
						<?php
 							if(isset($_POST['add_post']) && !empty($_POST['add_post'])){
 								if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['unit_id']) && !empty($_POST['unit_id'])){
 									$post_title= str_replace(array('"',"'"), '', strip_tags(htmlspecialchars(scr(trim($_POST['title'])))));
									$post_unit = scr(trim($_POST['unit_id']));
									$sq = "UPDATE `post` SET `title` = '{$post_title}' , `unit_id` = '{$post_unit}'";
									$post_content = $content;
 									if(isset($_POST['content']) && !empty($_POST['content'])){
 										$post_content = htmlspecialchars($_POST['content']);
 										$sq .= " , `content` = '{$post_content}'";
 									}
 									$sq .= " WHERE `post_id` = '{$post_id}' AND `student_id` = '{$student_id}' LIMIT 1";
 									$update = mysqli_query($GLOBALS['connection'],$sq); 
 									$title = $post_title;
 									$post_unit_id = $post_unit;
 									$content = $post_content;
 									if($update){
 										echo "<div class='alert alert-success'>تم حفظ التغيرات</div>";	
 										require("my_posts_edit_img.php");
 									}
 								}else{echo "<div class='alert alert-danger'>رجاء اكمل بيانات النموذج</div>";}
 							}
						?>

						<form enctype="multipart/form-data" class="new-post-form" name="appoint_form" id="appoint_form" method="post" action="<?php echo $GLOBALS['domain'].'my_posts/'.$post_id; ?>">
							<div class="form-group">
								<label for="app_fname">عنوان المنشور</label>
								<input type="text" name="title" id="app_fname" placeholder="عنوان المنشور" value="<?php echo $title; ?>">
							</div>
							
							<div class="form-group">
							<label for="gender">المنتدى</label>
							<select name="unit_id" id="gender">
								<?php 
								foreach ($unit_array as $key=> $value){ 
								 ?>
								<option value="<?php echo $key; ?>"<?php if($key == $post_unit_id){echo ' selected="selected"';} ?>><?php echo $value;?></option><?php } ?>
							</select>
							</div>

							<div class="form-group"> 
								<label for="add_image"><?php echo $img_label; ?></label>
								<?php    	   
                            		if(isset($img) && !empty($img)){
                            			$viw = "post-img-preview-label-undrr";
                            			$img_src = $GLOBALS['files_domain'].'posts/'.$post_id.'_200.'.$img.'?_x='.time();
                            			echo '<img src="'.$img_src.'" class="post-img-preview">';
                            			$img_label = "تغيير الصورة";
                            		}
                            	?>
								<label for="add_image" class="<?php echo $viw; ?> btn btn-info btn-rounded"><i class="fa fa-folder"></i> <?php echo $img_label; ?></label>
								<input type="file" name="post_img" id="add_image" class="btn btn-danger">
							</div>
							<div class="form-group">
								<label for="app_msg">محتوى المنشور</label>
								<textarea class="summernote text_content" name="content"><?php echo $content ; ?></textarea>
							</div>
							
							<div class="form-group">
								<input type="submit" name="add_post" value="حفظ التغيرات" class="btn btn-success new-post-submit btn-rounded">
							</div>
						</form>
					</div>
<?php /*
<link href="<?php echo $site_data; ?>js/summernote/summernote.css" rel="stylesheet" />
<script src="<?php echo $site_data; ?>js/summernote/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".summernote").summernote({height:300,tabsize:2});
    });
</script>
*/ ?>
<?php require("forum_units.php"); ?>
		</div>
</div>
		<?php
	}else{goto EndEdt;}
}else{
	EndEdt:
	redir($GLOBALS['domain'].'my_posts',0);
}
?>