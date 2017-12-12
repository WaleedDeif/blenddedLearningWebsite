<section class="sub-page-banner dna-cover dna-cover-3 text-center" data-stellar-background-ratio="0.6">
    
    <div class="overlay"></div>
    
    <div class="container">
        <h1 class="entry-title">الاسئلة الشائعة</h1>
    </div>
    
</section>


<div id="sub-page-content" class="clearfix">
  <div class="container">
		<div class="panel-group faq-page" id="accordion">
<?php
$sql = "SELECT * FROM `faq` ORDER BY `faq_id` ASC";
$q=mysqli_query($GLOBALS['connection'],$sql);
// fetching the names from db
if(mysqli_num_rows($q)>0){
$counter=1; 
while($faq_row=mysqli_fetch_assoc($q)){
  $faq_title  = $faq_row['title'];
  $faq_text = $faq_row['text'];
  ?>
              <!-- Start FAQ Item -->
              <!-- change href & id of collapse_NULBER f each item -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $counter; ?>" class="collapsed">
                      <span><i class="fa fa-plus"></i></span><?php echo $faq_title; ?>
                    </a>
                  </h4>
                </div>
                <div id="collapse_<?php echo $counter; ?>" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo $faq_text; ?></div>
                </div>
              </div>  
      <!-- End FAQ Item -->

  <?php
  $counter++;
  }
}
?>              
        </div>
 </div>

</div>