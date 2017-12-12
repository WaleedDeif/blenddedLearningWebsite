<div id="main-banner" class="owl-carousel main-banner slide-show-home clearfix">
<?php
require($GLOBALS['helper']."calc_exam.php");
$limit_last_posts = 0;
$slide_show = array(
  "علم الأحياء Biology" => "ذلك الْعلم الذي يَهْتم بِدرَاسةِ الْأَحْيَاءِ كَالنبَاتَات وَالْحَيوانَات وَالْكائنات الْحيةِ الْأُخْرَى مِنْ حيث تَرْكيبها وَنموهَا وَتَكَاثرها وَتَصْنِيفها وَبِيئتها"
  ,"فروع علم الأحياءBranches of Biology" => 'يَضم عِلْمُ الْأَحْيَاءِ أَرْبَعَة فَرُوعٍ رَئِيِسة هِي " عِلْمُ النّبَاتِ " Botany ، و " عِلْمُ الْحَيَوَانِ " Zoology ، و " عِلْمُ الْأَحْيَاءِ الْمجْهَرِيةِ " Microbiology ، و " عِلْمُ التطَور " Evolution ، يخرج من كل فرع رئيس علوم أخرى كثيرة.'
  ,"التنور البيولوجي  Biological Literacy" => 'قدر من المعرفة والمهارات يكتسبه الطلاب في مجال علم الأحياء يمكنهم من الحل العلمي للمشكلات البيولوجية المرتبطة بالحياة اليومية في النواحي البيئية والغذائية والصحية والسكانية والبيوتكنولوجية ، والتعامل معها بإيجابية تضمن النفع المتبادل بين الانسان والعلم والبيئة المحيطة.'
  ,"التعلم المدمجBlended Learning " => ' أسلوب تعليمي متكامل يمزج بين استراتيجيات متنوعة للتدريس الصفي الفاعل ، مع استراتيجيات التعليم الإلكتروني المتزامن وغير المتزامن بالاستعانة بالفصل الدراسي التقليدي ، والمختبر ، والرحلات الميدانية من ناحية ؛ وصفحات الويب ،والموقع التعليمي ،والبريد الإلكتروني ،وشبكات التواصل الاجتماعي من ناحية أخرى.'
  );
$slide_show_counter = 1;
foreach ($slide_show as $slide_title => $slide_content) {
  ?>
<div class="item slide-item">
  <img src="<?php echo $site_data; ?>images-list/slide-<?php echo $slide_show_counter; ?>.jpg" alt="" title="">
  <div class="slider-caption">
    <p class="slide-title"><?php echo $slide_title; ?></p><br/>
    <p class="slide-content"><?php echo $slide_content; ?></p>
  </div>
</div>
  <?php
  $slide_show_counter++;
}
?>
</div>

           <section class="hider sub-page-banner medicom-awesome-features-sec-x full-cover text-center" data-stellar-background-ratio="0.3" style="background: url('<?php echo $site_data; ?>images-list/full-cover-2.jpg')">

                
                <!-- <div class="overlay"></div> -->
                
                <div class="container">
                    <h1 class="entry-title">Biology</h1>
                    <p> is a natural science concerned with the study of life and living organisms, including their structure, function, growth, evolution, distribution, identification and taxonomy. Modern biology is a vast and eclectic field, composed of many branches and subdisciplines.</p>
                </div>
                
            </section>


<?php require("home_notice.php"); ?>

<div class="row text-center no-margin home-big-list">
                
                <div class="col-md-4 bg-default">
                    
                    <div class="home-box">
                        <span class="glyphicon glyphicon-tint"></span>
                        <h3>المنتدى</h3>
                        <p>ناقش زملائك فى المادة العلمية واعرف كل ما هو جديد من خلال المنتدى...</p>
                        <a href="<?php echo $GLOBALS['domain'].'forum';?>" class="btn-rounded btn-bordered">اعرف المزيد</a>
                    </div>
                    
                </div>
                
                <div class="col-md-4">
                    
                    <div class="home-box opening-hours clearfix">
                        
                        <span class="glyphicon glyphicon-time"></span>
                        <h3>الامتحانات الحالية</h3>
                        <!-- <p>If you need a doctor for to the consectetuer
             consectetur adipiscing Graphic Design is elit.</p> -->
                        
                        <ul class="list-unstyled">
                          <?php
                          $seted_exams = 0;
                          $query= "SELECT `exam_id` , `start_date`,`end_date`,`unit_id`,`title` FROM `exam` ORDER BY `end_date` ASC";
                          $result = mysqli_query($GLOBALS['connection'],$query);
                          if($result){
                          if(mysqli_num_rows($result)>0)
                          {
                            while ($data= mysqli_fetch_assoc($result)) 
                            {
                              if($seted_exams >= 4){break;goto endExamsView;}
                              $end_date= $data['end_date'];
                              $start_date = $data['start_date'];
                              if(isset($start_date) && !empty($start_date) && isset($end_date) && !empty($end_date)){
                                $title= $data['title'];
                                $exam_id =$data['exam_id'];
                                $calc_exam = calc_exam($start_date,$end_date);
                                $calc_exam_status = $calc_exam['status'];
                                // echo $end_date.'- '.$start_date.'<br>';
                                if(isset($calc_exam_status) && !empty($calc_exam_status)){
                                  if($calc_exam_status === "answers" || $calc_exam_status === "exam"){
                                    $query_quesx="SELECT `exam_id` , `question_id` FROM `question` WHERE `exam_id`='{$exam_id}'";
                                    $res_quesx=mysqli_query($GLOBALS['connection'],$query_quesx);
                                    if($res_quesx){
                                    $question_num=mysqli_num_rows($res_quesx);

                                    if($question_num>0)
                                    { 
                                      $astnsIDs = '';
                                      while($qss=mysqli_fetch_assoc($res_quesx)){$astnsIDs .= $qss['question_id'].',';}$astnsIDs = substr($astnsIDs, 0,-1);
                                      $chech_student_sql = "SELECT `question_id` , `student_id` FROM `result` WHERE `student_id` = '{$student_id}' AND `question_id` IN ({$astnsIDs})"; 
                                      $chech_student_q = mysqli_query($GLOBALS['connection'],$chech_student_sql);
                                      if($chech_student_q){
                                        if(mysqli_num_rows($chech_student_q) == 0){
                                            $seted_exams++;
                                            $unit_id= $data['unit_id']; 
                                            $unit_query = "SELECT `title` , `unit_id` from unit WHERE unit_id ='$unit_id' AND status=1 "; 
                                            $unit_result= mysqli_query($GLOBALS['connection'],$unit_query); 
                                            if(mysqli_num_rows($unit_result) ==1 ){
                                              $unit_data = mysqli_fetch_assoc($unit_result); 
                                              $unit_title= $unit_data['title']; 
                                              ?>
                                              <li class="clearfix">
                                              <a class="exam-in-home" href="<?php echo $GLOBALS['domain'].'exam/'.$exam_id; ?>">
                                                  <?php echo $title." - ".$unit_title ;  ?>
                                              </a>
                                              <div class="value" title="تاريخ الانتهاء">
                                                  <?php echo $end_date  ; ?>
                                              </div>
                                              </li>
                                              <?php
                                            }
                                        }
                                      }
                                    }}
                                  }
                                }

                              }                                
                          }
                          // echo '<a href="'.$GLOBALS['domain'].'exams" class="btn-rounded btn-warning btn-bordered see-all-exams">عرض كل الامتحانات</a>';
                         }else {goto nexms;}
                       }else{goto nexms;} 
                       endExamsView:
                       if($seted_exams == 0){
                        nexms:
                        echo '<div class="alert alert-info"> لا توجد امتحانات حالياً  </div>';
                       }
                         ?>
                        </ul>
                    </div>
                    
                </div>
                
                <div class="col-md-4 bg-default">
                    
                    <div class="home-box">
                        <span class="glyphicon glyphicon-tint"></span>
                        <h3>الموضـوعات</h3>
                        <!-- <p>If you need a doctor for to consectetuer Lorem ipsum dolor, consectetur adipiscing elit. Ut volutpat eros s adipiscing elit. Ut volutpat eros sit.</p> -->
                        <a href="<?php echo $GLOBALS['domain'].'units';?>" class="btn-rounded btn-bordered">عرض كل الموضوعات</a>
                    </div>
                    
                </div>
                
            </div>


             <div id="sub-page-content">
            
            
                <div class="container big-font doc-review">
                    <h2 class="light bordered main-title"><span>عبدالرزاق النوبى</span></h2>
                    <div class="media pull-right"><a href="<?php echo $GLOBALS['domain']; ?>cv" class="fancybox-media"><img src="<?php echo $site_data; ?>images-list/personal.jpg" class="img-rounded" alt="" title=""></a></div>
                    <p class="prv-contnt">تسارعت في الآونة الأخيرة عجلة التطور في شتى مناحي الحياة ، وجميع فروع المعرفة ؛ حتى أصبح من دروب المستحيل مواكبة تلك التطورات بأساليب لا تناسب العصر ، ولا تلبي احتياجات الحاضر ، وأصبح العبء على المؤسسة التربوية بمعلميها ، وطلابها ، ومناهجها كبيرًا، حيث أصبح لزامًا على الجميع مواكبة هذا التطور المعرفي ، فلم يعد المعلم هو مصدر المعرفة الفريد، ولا الكتاب المدرسي يشبع نهم الطلاب إلى المعرفة منفردًا، حتى وقت المدرسة ضاق جدًا على كفاية المعرفة المفترض إكسابها للطلاب. من هنا كان عليك بني أن تسلك سبلا جديدة تضمن لك عملية تعلم مستمرة في المدرسة والمنزل
، كالتعلم المدمج 
، الذي يجعلك مسايرً، ومستفيدًا من التطور التكنولوجي ، وهذا يجعل منك في النهاية فردًا متفوقًا أكاديميًا ، ومتنورًا بيولوجيًا.</p>
                    
                    <a href="<?php echo $GLOBALS['domain']; ?>cv" class="prv-link btn btn-default btn-rounded">عرض السيرة الذاتية</a>
                </div>
                
                
                <div class="height20"></div>
                
                
                
                
                
                <!-- Features
                ============================================= -->
                <?php 
                  require("units_topic_1.php");
                ?>
                <div class="container big-font">
                    <h2 class="light bordered main-title"><span>المـوضوعات</span></h2>
                    <?php
                      $add_after_units_grid = '<a href="'.$GLOBALS['domain'].'units" class="units-list-home-link btn btn-success btn-rounded">عرض كل الموضـوعات</a>';
                      $limit_units = " LIMIT 3";
                      require("units_grid.php");
                    ?>
                </div>
                <?php 
                  require("units_topic_2.php");
                ?>          
                
                
                
                <!-- Our Hospitals and Why Choose Medicom
                ============================================= -->
                <div class="container padding-top-35 clearfix">
                
                    <div class="row">
                
                        <div class="col-md-6 dr-alerts">
                            
                            <h2 class="light bordered"><span>أخر التنبيهات</span></h2>
                            
                            <div class="no-margin-bottom alerts-list">
                                <?php 
                                $query = "SELECT `title` , `date`,`text` from alert where status=1 ORDER BY `date` DESC LIMIT 4"; 
                                $result= mysqli_query($GLOBALS['connection'],$query); 
                                $alert_num = mysqli_num_rows($result);
                                 if($alert_num > 0  ){
                                  $limit_last_posts = $alert_num;
                                    while($data = mysqli_fetch_assoc($result)){
                                     $date = date('Y-m-d',strtotime($data['date']));
                                     $full_alert_title_content = $data['title'].' - '.$data['text'];
                                     if(mb_strlen($data['title'])>16 )
                                     {
                                     $title= mb_substr($data['title'],0, 16,'UTF-8');
                                     $title_long = true ; 
                                     }
                                     else 
                                     {
                                     $title= $data['title'];
                                     $title_long= false ;  
                                      }
                                      if(mb_strlen($data['text'])>55 )
                                     {
                                     $text= mb_substr($data['text'],0,55,'UTF-8');
                                     $text_long = true ; 
                                     }
                                     else 
                                     {
                                     $text= $data['text'];
                                     $text_long= false ;  
                                     // 
                                      } 
                                        echo '<div title="'.$full_alert_title_content.'" class="alert alert-info"><strong title="'; if($title_long==true) echo $data['title']; echo ' ">'.$title.' </strong> <span class="alert-content">'.$text.'</span> <span class="alert-date date-in-alerts">'.$date.'</span></div>';
                                    
                                    }
                                  }else{
                                    echo '<div class="alert alert-info alert-info-2">لا توجد تنبيهات حاليا</div>';
                                    $limit_last_posts = 1;
                                    goto NoAlertReadMore;
                                  }
                                ?>
                                <a href="<?php echo $GLOBALS['domain']; ?>alert" class="s-more">إعرض المزيد</a>
                                <?php NoAlertReadMore: ?>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-6 latest-forum">
                        
                            <h2 class="light bordered"><span>أحدث منشورات المنتدى</span></h2>
                            <div class="panel-group" id="accordion">
                                    
                              <?php /*      <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title active">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="">
                                          <span><i class="fa fa-plus fa-minus"></i></span>مراحل نمو الجنين قبل الولادة
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse in" style="height: auto;">
                                      <div class="panel-body">
                                        هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما-..
                                        .... <a href="">إقرأ المزيد</a>
                                      </div>
                                    </div>
                                  </div>
                                  <?php */?>
                               <?php 
                                 $query = "SELECT `title`,`content`,`post_id` from `post` WHERE status= 1  order by `date` DESC LIMIT {$limit_last_posts}  "; 
                                 $result = mysqli_query($GLOBALS['connection'],$query);
                                 $post_counter= 0 ;  
                                 if(mysqli_num_rows($result)> 0  ){
                                    while($data = mysqli_fetch_assoc($result)){
                                        $post_counter++;
                                        $content = htmlspecialchars(strip_tags($data['content']));
                                        if(mb_strlen($data['content'])>0)
                                        {
                                        $content = mb_substr($content,0,225,'UTF-8');
                                        } 
                                        $title = $data['title'];
                                        $post_id = $data['post_id'];
                                      ?>
                                    <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4  class="<?php if($post_counter==1) echo 'panel-title active'; else echo 'panel-title'; ?>">
                                        <a data-toggle="collapse" data-parent="#accordion" href="<?php echo '#post'.$post_counter ; ?>"  class="">
                                          <span><i class="<?php if($post_counter==1) echo 'fa fa-plus fa-minus'; else echo 'fa fa-plus'; ?> "></i></span><?php echo $title ?>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="<?php echo 'post'.$post_counter ; ?>" class="<?php if($post_counter==1) echo 'panel-collapse collapse in '; else echo 'panel-collapse collapse'; ?>" style="height: auto;">
                                      <div class="panel-body">
                                        <?php echo $content.".." ;?> .... <a href="<?php echo $GLOBALS['domain'].'post/'.$post_id; ?>">إقرأ المزيد</a>
                                      </div>
                                    </div>
                                  </div>
                                  <?php }} 
                                ?>
                                </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
        </div>