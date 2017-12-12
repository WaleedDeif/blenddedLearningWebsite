<?php 
// selcting visible units from the DB.
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
						
						<h2 class="light bordered"><span>اضافة منشور</span></h2>
						<?php
						if(isset($_POST['add_post'])){
							if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['unit_id']) && !empty($_POST['unit_id'])){
								$post_title= str_replace(array('"',"'"), '', strip_tags(htmlspecialchars(scr(trim($_POST['title'])))));
								$post_unit = scr(trim($_POST['unit_id']));
								$student_id = $_SESSION['student_id'];
								// if(!$fatal_error){
								$post_query = "INSERT INTO `post` (`unit_id`,`title`,`student_id`)VALUES('$post_unit','$post_title','$student_id')";
								$post_result = mysqli_query($GLOBALS['connection'],$post_query); 
								if($post_result){
									echo "<div class='alert alert-success'>جارى اضافة المنشور رجاء الانتظار.....</div>";
									echo '<style type="text/css">.new-post-form{display: none;}</style>';
									redir($GLOBALS['domain'].'my_posts/'.$GLOBALS['connection'] -> insert_id,1.5);
								}else{
									echo "<div class='alert alert-danger'>حدث خطأ ما</div>";	
								}
							}else{
										echo "<div class='alert alert-danger'>رجاء اكمل بيانات النموذج</div>";
							}
						}
						?>

						<form class="new-post-form" name="appoint_form" id="appoint_form" method="post" action="<?php echo $GLOBALS['domain']; ?>new_post">
							<div class="form-group">
								<label for="app_fname">عنوان المنشور</label>
								<input type="text" name="title" id="app_fname" placeholder="عنوان المنشور">
							</div>
							
							<div class="form-group">
							<label for="gender">المنتدى</label>
							<select name="unit_id" id="gender">
								<?php 
								foreach ($unit_array as $key=> $value){ 
								 ?>
								<option value="<?php echo $key; ?>"><?php echo $value;?></option><?php } ?>
							</select>
							</div>
 

							<div class="form-group">
								<input type="submit" name="add_post" value="نشر" class="btn btn-success new-post-submit btn-rounded">
							</div>
						</form>
					</div>
					
<?php require("forum_units.php"); ?>


				</div>
</div>