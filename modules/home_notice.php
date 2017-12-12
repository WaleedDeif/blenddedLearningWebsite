<?php

$query_notice="SELECT * FROM `notice` ORDER BY `notice_id` DESC";
$result_notice=mysqli_query($GLOBALS['connection'],$query_notice);
// fetching the names from db
if(mysqli_num_rows($result_notice)>0)
{
$counter_notice=0; 
?>
<section class="home-notice sub-page-banner medicom-awesome-features-sec-x full-cover text-center" data-stellar-background-ratio="0.3" style="background: url('<?php echo $site_data; ?>images-list/full-cover-2.jpg')">

    
    <!-- <div class="overlay"></div> -->
    
    <div class="container">
        <!-- <h1 class="entry-title">Biology</h1>
        <p> is a natural science concerned with the study of life and living organisms, including their structure, function, growth, evolution, distribution, identification and taxonomy. Modern biology is a vast and eclectic field, composed of many branches and subdisciplines.</p> -->

        <body>
<div id="text-carousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="row text-carousel-row">
        <div class="col-md-12">
            <div class="carousel-inner">
            	<?php
				while($notice_data=mysqli_fetch_assoc($result_notice)){
					$notice_text = $notice_data['notice'];
					$notice_date = date("Y-m-d",strtotime($notice_data['date']));
					$active_class = ($counter_notice == 0) ? ' active' : '';
            	?>
                <div class="item<?php echo $active_class; ?>">
                    <div class="carousel-content">
                        <div>
                            <p class="notice"><?php echo $notice_text; ?></p>
                            <span class="notice-date"><?php echo $notice_date; ?></span>
                        </div>
                    </div>
                </div>
                <?php $counter_notice++; } ?>
            </div>
        </div>
    </div>
    <!-- Controls --> <a class="left carousel-control" href="#text-carousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
 <a class="right carousel-control" href="#text-carousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>

</div>
    </div>
    
</section>
<?php } ?>