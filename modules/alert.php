<section class="sub-page-banner dna-cover dna-cover-5 text-center" data-stellar-background-ratio="0.6">
    
    <div class="overlay"></div>
    
    <div class="container">
        <h1 class="entry-title">التنبيـــهات</h1>
    </div>
    
</section>



 <div id="sub-page-content" class="clearfix">

		            
    <div class="container alerts-list"> 

<?php

 $alert_query="SELECT `title`,`date`,`text`,`status` FROM `alert` WHERE `status`= '1' ORDER BY `date` DESC ";
 $alert_result=mysqli_query($GLOBALS['connection'],$alert_query);
    if(mysqli_num_rows($alert_result)>0)
    {
        while($row=mysqli_fetch_assoc($alert_result))
         { 
        $title=$row['title'];
        $text=$row['text'];
        $date=$row['date'];
        $date=strtotime($date);
        $date=date('Y-m-d',$date);
        echo '<div class="alert alert-info"><strong>'.$title.'</strong> <span class="alert-content">'.$text.'</span> <span class="alert-date date-in-alerts" >'.$date.'</span></div>';
        }
    }
    else 
    {
        // no alerts found
    echo '<div class="alert alert-info alert-info-2">لا توجد تنبيهات حاليا</div>';

    }
?>
  </div>
</div>