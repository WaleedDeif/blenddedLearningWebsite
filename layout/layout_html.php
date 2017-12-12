<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <base href="" />
    <!-- Basic Page Needs

     ================================================== -->
     
     <meta charset="utf-8">
     
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
     <link rel="icon" type="image/png" href="<?php echo $site_data; ?>images-list/favicon.ico">
    
     <title>عبدالرزاق النوبى</title>
    
    <meta name="description" content="Dr.Abdul Razzak Nouby blended learning is a program that works through the Internet, which serves the area of e-learning technology and blended learning built for a special students only and not for the general visitor Implemented this good level due to sign up with the wonderful team that helped me to achive this software in standard period">
    <meta name="author" content="http://msa3d.com/noubysaleh">
    <meta name="keywords" content="Mahmoud Saad,Waleed Hamdy,Hossam Mohammed,http://msa3d.com/,http://msa3d.com/noubysaleh,noubysaleh,عبدالرزاق النوبى,محمود سعد,وليد حمدى,حسام محمود">
    
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    
     <meta name="format-detection" content="telephone=no">

     
     <!-- Web Font
     ============================================= -->
     <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet"> -->
     
    
    <!-- CSS
    
     ================================================== -->
     
     
    <!-- Theme Color
    ============================================= -->
    <link rel="stylesheet" id="color" href="<?php echo $site_data; ?>css/blue.css">
    
    
    <!-- Medicom Style
    ============================================= -->
    <link rel="stylesheet" href="<?php echo $site_data; ?>css/medicom.css">

    
    <!-- Bootstrap
    ============================================= -->
    <link rel="stylesheet" href="<?php echo $site_data; ?>css/bootstrap.css">


    <!-- Theme Color
    ============================================= -->
    <link href="<?php echo $site_data; ?>css/light.css" rel="stylesheet" id="choose-theme">  

    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.<?php echo $site_data; ?>js/1.3.0/respond.min.js"></script>
    <![endif]-->

    
    
    <!-- Header Scripts
    
    ================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo $site_data; ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo $site_data; ?>css/www.msa3d.com.css">
    <script src="<?php echo $site_data; ?>js/modernizr-2.6.2.min.js"></script>
    
<script src="<?php echo $site_data; ?>js/jquery.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->

    </head>
    <body class="fixed-header">
  
        <!-- Document Wrapper
        ============================================= -->
        <div id="wrapper" class="clearfix">
    
    
            <!-- Header
            ============================================= -->
            <header id="header" class="medicom-header">
            
                <!-- Top Row
                ============================================= -->
                <div class="colourfull-row"></div>
            
                <div class="container">
                    
                    
                    <!-- Primary Navigation
                    ============================================= -->
                    <nav class="navbar navbar-default" role="navigation">
                    
                        <!-- Brand and toggle get grouped for better mobile display
                        ============================================= -->
                        
                        <div class="navbar-header">
                            
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-nav">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                            
                            <a class="navbar-brand main-logo" href="<?php echo $GLOBALS['domain']; ?>"><img src="<?php echo $site_data; ?>images/logo.png" alt="" title=""></a>
                        
                        </div>
                    
                        
                        <div class="collapse navbar-collapse navbar-right" id="primary-nav">
                            
                            <ul class="nav navbar-nav">
                                
                                <li class="menu-link-home">
                                    <a href="<?php echo $GLOBALS['domain']; ?>" >الرئيسية</a>                     
                                </li>
                                
                                <li class="menu-link-units menu-link-unit">
                                    <a href="<?php echo $GLOBALS['domain']; ?>units">الموضوعات</a>
                                </li>

                                <li class="menu-link-forum">
                                    <a href="<?php echo $GLOBALS['domain']; ?>forum">المنتدى</a>
                                </li>
                              
                                <li class="menu-link-result">
                                    <a href="<?php echo $GLOBALS['domain']; ?>result">النتائج</a>
                                </li>

                                <li class="menu-link-alert">
                                    <a href="<?php echo $GLOBALS['domain']; ?>alert">التنبيهات</a>
                                </li>
                              
                                <li class="menu-link-faq">
                                    <a href="<?php echo $GLOBALS['domain']; ?>faq">الاسئلة الشائعة</a>
                                </li>
                              
                                <li class="menu-link-logout">
                                    <a href="<?php echo $GLOBALS['domain']; ?>logout">تسجيل الخروج</a>
                                    
                                </li>
                              
                              
                            </ul>
                            
                        </div>
                        
                    </nav>

                </div>
                
                <div class="header-bottom-line"></div>

            </header>


            <?php require("modules/{$open_app}.php"); ?>  
            <script type="text/javascript">$(document).ready(function(){$(".menu-link-<?php echo $open_app; ?>").addClass('active');});</script>
    
    
        <div class="colourfull-row"></div>
    
    
        
        <!-- Footer
        ============================================= -->
        <footer id="footer" class="light">
            
            <div class="container">
                
                <div class="row">
                
                    <div class="col-md-5 footer-list">
                        
                        <!-- Footer Widget
                        ============================================= -->
                        <div class="footer-widget">
                            
                            <h4><span>الموضوعات</span></h4>  
                            <ul class="footer-nav list-unstyled clearfix">
                                   <?php 
                            $query = "SELECT unit_id,title FROM unit WHERE status=1";
                            $result = mysqli_query($GLOBALS['connection'],$query); 
                            if(mysqli_num_rows($result)>0)
                            {
                                while($data= mysqli_fetch_assoc($result))
                                {
                                    $unit_id= $data['unit_id'];
                                    $title = $data['title']; ?>
                                <li><a href="<?php echo $GLOBALS['domain'].'unit/'.$unit_id ;  ?>"><i class="fa fa-long-arrow-left"></i><?php echo $title ;  ?></a></li>
                                <?php 
                                }
                            }else {
                                echo "<li> لا توجد موضوعات ظاهرة  </li>";
                            }
                                ?>
                            </ul>
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4 footer-list">
                    
                        <!-- Footer Widget
                        ============================================= -->
                        <div class="footer-widget">
                            
                               <h4><span>عبدالرزاق النوبى</span></h4>
                            
                                <ul class="footer-nav footer-list-1 list-unstyled clearfix">
                                    <li><a href="<?php echo $GLOBALS['domain'];?>"><i class="fa fa-long-arrow-left"></i>الرئيسية</a></li>
                                    <li><a href="<?php echo $GLOBALS['domain'].'forum' ;  ?>"><i class="fa fa-long-arrow-left"></i>المنتدى</a></li>
                                    <li><a href="<?php echo $GLOBALS['domain'].'result' ;  ?>"><i class="fa fa-long-arrow-left"></i>النتائج</a></li>
                                    <li><a href="<?php echo $GLOBALS['domain'].'alert' ;  ?>"><i class="fa fa-long-arrow-left"></i>التنبيهات</a></li>
                                    <li><a href="<?php echo $GLOBALS['domain'].'faq';  ?>"><i class="fa fa-long-arrow-left"></i>الاسئلة الشائعة</a></li>
                                    <li><a href="<?php echo $GLOBALS['domain'].'logout';  ?>"><i class="fa fa-long-arrow-left"></i>تسجيل الخروج</a></li>
                                    
                                </ul>
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-3 footer-list">
                       
                        <!-- Footer Widget
                        ============================================= -->
                        <div class="footer-widget">
                            <a class="footer-logo" href="<?php echo $GLOBALS['domain']; ?>"><img src="<?php echo $site_data; ?>images/logo.png" alt="" title=""></a>
                            
                            <ul class="social3 clearfix f-social">
                                <li><a href="#."><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#."><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#."><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#."><i class="fa fa-skype"></i></a></li>
                                <li><a href="#."><i class="fa fa-youtube"></i></a></li>
                            </ul>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
            <!-- Copyright
            ============================================= -->
            <p class="copyright text-center">
                <span class="cop">
                    <span class="copy-he">Copyright &copy; <?php echo date("Y"); ?> <a href="http://msa3d.com/noubysaleh" target="_blank">Abdulrazzaknouby</a>. All right reserved.</span>
                    <span class="copy-we">developed by <a href="http://msa3d.com/noubysaleh" target="_blank">msa3d</a></span>
                </span>
            </p>
            
        </footer>
    
        <!-- back to top -->
        <a href="#." class="back-to-top profile-icon profile-icon-hover" id="back-to-top">
            <i class="fa fa-user"></i>
            <span class="profile-name"><?php echo $_SESSION['student_name']; ?></span>
        </a>
 <button type="button" class="btn btn-info btn-lg profile_modal" data-toggle="modal" data-target="#profile_modal"></button>

  <!-- Modal -->
  <div class="modal fade" id="profile_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $_SESSION['student_name']; ?></h4>
        </div>
        <div class="modal-body">
          <ul class="profile-links-ul">
                <li>
                  <a href="<?php echo $GLOBALS['domain']; ?>logout"><img src="<?php echo $site_data; ?>images-list/logout.png"><span>تسجيل الخروج</span></a>
              </li>
              <li>
                  <a href="<?php echo $GLOBALS['domain']; ?>change_password"><img src="<?php echo $site_data; ?>images-list/change_password.png"><span>تغيير الرقم السرى</span></a>
              </li>
              <li>
                  <a href="<?php echo $GLOBALS['domain']; ?>profile"><img src="<?php echo $site_data; ?>images-list/profile.png"><span>الملف الشخصى</span></a>
              </li>
              
          </ul>
        </div> 
      </div>
      
    </div>
  </div>
    
    </div><!--end #wrapper-->
    
    
    
    
    <!-- All Javascript 
    ============================================= -->
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" id="color" href="<?php echo $site_data; ?>js/owl.carousel.css">
    <script src="<?php echo $site_data; ?>js/bootstrap.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="<?php echo $site_data; ?>js/jquery.stellar.js"></script>
    <script src="<?php echo $site_data; ?>js/jquery-ui-1.10.3.custom.js"></script>
    <script src="<?php echo $site_data; ?>js/owl.carousel.js?_=3"></script>
    <script src="<?php echo $site_data; ?>js/counter.js"></script>
    <script src="<?php echo $site_data; ?>js/waypoints.js"></script>
    <script src="<?php echo $site_data; ?>js/jquery.uniform.js"></script>
    <script src="<?php echo $site_data; ?>js/easyResponsiveTabs.js"></script>
    <script src="<?php echo $site_data; ?>js/jquery.fancybox.pack.js"></script>
    <script src="<?php echo $site_data; ?>js/jquery.fancybox-media.js"></script>
    <script src="<?php echo $site_data; ?>js/jquery.mixitup.js"></script>
    <script src="<?php echo $site_data; ?>js/forms-validation.js"></script>
    <script src="<?php echo $site_data; ?>js/jquery.jcarousel.min.js?_=3"></script>
    <script src="<?php echo $site_data; ?>js/jquery.easypiechart.min.js"></script>
    <script src="<?php echo $site_data; ?>js/scripts.js"></script>
    <script type="text/javascript" src="<?php echo $site_data; ?>js/arabic_numbers.min.js"></script>
    <script type="text/javascript">$(document).ready(function(){arabic_numbers(".arabic-number");});</script>
  </body>
</html> 