<div class="col-md-4 units-div">

<div class="procedures">

	<h3>الموضــوعات</h3>
	
	<div class="panel-group sidebar-nav" id="accordion3">
		<div class="panel panel-sidebar">
			<div class="panel-body">
				<?php foreach ($unit_array as $key => $value) { ?> 
				<a href="<?php echo $GLOBALS['domain'].'forum/'.$key ;  ?>" class="<?php if($key==$unit_id) echo 'active' ;?>">
					<i class="fa fa-angle-left"></i> 
					منتدى <?php echo $value ;  ?>
				</a>
				<?php } ?> 
			</div>
		</div>
	</div>
</div>
<div class="user-post-actions">
	<a class="btn btn-success" href="<?php echo $GLOBALS['domain']; ?>new_post">إضافة منشور</a>
	<a class="btn btn-info" href="<?php echo $GLOBALS['domain']; ?>my_posts">عرض منشوراتى</a>
</div>
</div>
