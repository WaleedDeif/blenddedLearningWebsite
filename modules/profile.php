<?php 

// updating the user data
$password_empty= false ;  
$empty_username = false ; 
$username_available = false ; 
$data_updated=false;
$data_unupdated=false ;
require($GLOBALS['helper'].'hash_password.php');
if(isset($_POST['appoint_form']))
{
 // checking the password is entered
if(isset($_POST['password'])&& !empty($_POST['password'])){
$password= scr($_POST['password']);
$hashed_password=hash_password($password);
$session_username= $_SESSION['student_username']; 
$student_id = $_SESSION['student_id'];
$query = "SELECT `password`,`student_id`  FROM `student` WHERE `student_id`='{$student_id}'"; 
$result = mysqli_query($GLOBALS['connection'],$query); 
if($result){
$data = mysqli_fetch_assoc($result); 
$db_password = $data['password'];
echo $hashed_password;
$student_id= $data['student_id'];
if($hashed_password===$db_password)
{
if(isset($_POST['username']) && !empty($_POST['username']))
{
$form_username= trim(scr($_POST['username']));
$query= "UPDATE `student` SET `username`='{$form_username}' WHERE student_id='$student_id'";
$result= mysqli_query($GLOBALS['connection'],$query); 
if($result==true)
{
$data_updated= true;
 $_SESSION['student_username']= $form_username;
}else {
    $username_available= true ; 
}

} else {
    $empty_username= true ; 
}  
}else
$data_unupdated= true;
{    
}
}
}else { $password_empty= true ; }
}
?> 

<section class="sub-page-banner dna-cover dna-cover-3 text-center" data-stellar-background-ratio="0.6">
    
    <div class="overlay"></div>
    
    <div class="container">
        <h1 class="entry-title">الملف الشخصى</h1>
    </div>
    
</section>


<div id="sub-page-content" class="clearfix">
  <div class="container profile-form">
		<form name="appoint_form" id="appoint_form" method="post" action="<?php echo $GLOBALS['domain']; ?>profile">
			<div class="form-group">
                <div class="col-sm-9 input-div">
                    <input disabled="disabled" type="text" placeholder="الاسم" id="name" class="form-control" name="name" value="<?php echo $_SESSION['student_name']; ?>">
                </div>
                <label class="col-sm-2 control-label" for="name">الاسم</label>
            </div>
			<div class="form-group">
                <div class="col-sm-9 input-div">
                    <input type="text" placeholder="اسم المستخدم" id="username" class="form-control" name="username" value="<?php echo $_SESSION['student_username']; ?>">
                </div>
                <label class="col-sm-2 control-label" for="username">اسم المستخدم</label>
            </div>

            <div class="form-group">
                <div class="col-sm-9 input-div">
                    <input type="text" placeholder="الرقم السرى" id="password" class="form-control" name="password">
                </div>
                <label class="col-sm-2 control-label" for="password">الرقم السرى</label>
            </div>

            <div class="form-group">
            	<div class="col-sm-9 input-div">
                <input type="submit" value="حفظ التغيرات" class="btn btn-default btn-rounded submiter" name= "appoint_form" onclick="">
                <a href="<?php $GLOBALS['domain']; ?>change_password" class="change-pass">تغير الرقم السرى</a>
                </div>
					
            </div>
			
			
		</form><BR>
          <?php if($empty_username==true || $password_empty == true){
            echo '<div class="alert-x alert alert-x alert-warning col-sm-3" style="float:center;"> رجاءاً اكمل النموذج </div> ';
        }?>

        <?php
        if($username_available==true){?>
         <div class='alert-x alert alert-x alert-warning col-sm-3'>اسم المستخدم موجود بالفعل جرب إدخال اسما اخر. يمكنك إضافة بعض الأرقام </div>
     <?php }?>
 <?php if($data_updated==true){?>
        <div class="alert-x alert alert-x alert-success col-sm-3"style="float:centercenter;" > تم تحديث البيانات بنجاح  </div>
        <?php } if($data_unupdated==true){?>
        <div class="alert-x alert alert-x alert-danger col-sm-3" style="float:centercenter;">رجاءاً تأكد من صحة كلمة السر</div>
        <?php }?>
        </div>
      

</div>