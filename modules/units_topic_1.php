<section class="services-sec container topic-list-1">

	<h2 class="light bordered text-right"><span>الأهداف العامة</span></h2>

	<a href="<?php echo $GLOBALS['domain']; ?>topic/topic-1" class="service-box one">
		<span class="iconx img-circle"><img src="<?php echo $GLOBALS['files_domain']; ?>public/topic-1.png"></span>
		<h4>الموضوع السادس( الفصل الثالث )</h4>
	</a>
	
	<a href="<?php echo $GLOBALS['domain']; ?>topic/topic-2" class="service-box one">
		<span class="iconx img-circle"><img src="<?php echo $GLOBALS['files_domain']; ?>public/topic-2.png"></span>
		<h4>الموضوعات الرابع والخامس( الفصل الثاني)</h4>
	</a>
	
	<a href="<?php echo $GLOBALS['domain']; ?>topic/topic-3" class="service-box two">
		<span class="iconx img-circle"><img src="<?php echo $GLOBALS['files_domain']; ?>public/topic-3.png"></span>
		<h4>الموضوعات الأول ، والثاني ، والثالث ( الفصل الأول )</h4>
	</a>
	 
</section>

<section class="services-sec container topic-list-2">
	
		<h2 class="light bordered text-right"><span>وصف موجز للموضوعات</span></h2>
	
		<div class="service-box-topic-4 one">
			<img src="<?php echo $GLOBALS['files_domain']; ?>public/topic-4.png">
			<p>سوف يتم تجريب أسلوب التعلم المدمج على ستة موضوعات تقع في ثلاثة فصول هي الفصل الأول (جهاز الهضم والغدد الصم) و الفصل الثاني (التكاثر والنمو في الانسان) و الفصل الثالث (جهاز المناعة)
			<a href="<?php echo $GLOBALS['domain']; ?>topic/topic-4">إقرأ المزيد...</a>
			</p>
		</div>		 
</section>



<section class="services-sec container topic-list-4">

	<h2 class="light bordered text-right"><span>عروض تعريفية</span></h2>
	<?php
		$video_1 = "عرض تعريفي بالتعلم المدمج ، والموقع";
		$video_2 = "عرض تعريفي بالتنور البيولوجي";
	?>
	<a target="_blank" href="<?php echo download_link("public","video_1.ppsx",$video_1.".ppsx"); ?>" class="service-box one">
		<span class="iconx img-circle"><img src="<?php echo $GLOBALS['files_domain']; ?>public/video.png"></span>
		<h4><?php echo $video_1; ?></h4>
	</a>
	
	<a target="_blank" href="<?php echo download_link("public","video_2.ppsx",$video_2.".ppsx"); ?>" class="service-box two">
		<span class="iconx img-circle"><img src="<?php echo $GLOBALS['files_domain']; ?>public/video.png"></span>
		<h4><?php echo $video_2; ?></h4>
	</a>
	 
</section>