<?php 
/*
all passwords should be from type password but this is ruining the design.
here  we change the passwords
*/

   
require($GLOBALS['helper'].'hash_password.php');
if(isset($_POST['change_password']))
{
 $missing_data= false ; 
 $new_password_mismatch=false;
 $wrong_password= false ; $password_updated=false;
 $db_error= false ; 
    if(isset($_POST['password']) && !empty($_POST['password']))
    {
        $password= scr($_POST['password']); 
        $hashed_password = hash_password($password);
        $username= $_SESSION['student_username']; 
        $query = "SELECT password,student_id from student WHERE username='$username' "; 
        $result = mysqli_query($GLOBALS['connection'],$query);
        if(mysqli_num_rows($result)==1)
        {
            $data = mysqli_fetch_assoc($result);
            $db_password=$data['password'];
            $student_id=$data['student_id']; 
            if($db_password===$hashed_password)
            {
                if(isset($_POST['new_password'])&& isset($_POST['new_password']) && isset($_POST['confirm_new_password']) && !empty($_POST['confirm_new_password']) )
                {
                    $new_password=scr($_POST['new_password']);
                    $confirm_new_password=scr($_POST['confirm_new_password']);
                    if($new_password===$confirm_new_password)
                    {
                        $hashed_new_password= hash_password($new_password);
                        $query="UPDATE student SET password='$hashed_new_password',password_text='$new_password' WHERE student_id='$student_id'";
                        $result= mysqli_query($GLOBALS['connection'],$query);
                        if($result==true)
                            
                            $password_updated=true;
                        else 
                            $password_updated= false ; 


                    }else
                    {
                        $new_password_mismatch=true;
                    }
                }else 
                {
                    $missing_data= true ; 
                }


            }else
            {
                $wrong_password= true ; 
            }

        }else
        {
            $db_error= true ; 
        }
    }else
    {
        $missing_data= true ; 
    }
}
?>
<section class="sub-page-banner dna-cover dna-cover-4 text-center" data-stellar-background-ratio="0.6">
    
    <div class="overlay"></div>
    
    <div class="container">
        <h1 class="entry-title">تغيير الرقم السرى</h1>
    </div>
    
</section>


<div id="sub-page-content" class="clearfix">
  <div class="container profile-form">
		<form name="change_password" id="change_password" method="post" action="<?php echo $GLOBALS['domain']; ?>change_password">
			<div class="form-group">
                <div class="col-sm-9 input-div">
                    <input type="text" placeholder="الرقم السرى الحالى" id="password" class="form-control" name="password">
                </div>
                <label class="col-sm-2 control-label" for="password">الرقم السرى الحالى</label>
            </div>
            

            <div class="form-group">
                <div class="col-sm-9 input-div">
                    <input type="text" placeholder="الرقم السرى الجديد" id="new_password" class="form-control" name="new_password">
                </div>
                <label class="col-sm-2 control-label" for="new_password">الرقم السرى الجديد</label>
            </div>
            

            <div class="form-group">
                <div class="col-sm-9 input-div">
                    <input type="text" placeholder="تأكيد الرقم السرى الجديد" id="confirm_new_password" class="form-control" name="confirm_new_password">
                </div>
                <label class="col-sm-2 control-label" for="confirm_new_password">تأكيد الرقم السرى الجديد</label>
            </div>

            <div class="form-group">
            	<div class="col-sm-9 input-div">
                <input type="submit" value="حفظ التغيرات" name="change_password" class="btn btn-danger btn-rounded submiter" onclick="">
                <a href="<?php $GLOBALS['domain']; ?>profile" class="change-pass">الملف الشخصى</a>
                </div>
					
            </div>
			
			
		</form>
<?php 
if(isset($_POST['change_password']))
{
?>
    <?php
        if($missing_data==true){?>
         <div class='alert-x alert alert-warning col-sm-3'>من فضلك املأ جميع حقول النموذج </div>
     <?php }?>
     <?php
        if($new_password_mismatch==true){?>
         <div class='alert-x alert alert-x alert-warning col-sm-3'> الرجاء التأكد من تطابق كلمة المرور الجديدة في الحقلين </div>
     <?php }?>
     <?php
        if($db_error==true){?>
         <div class='alert-x alert alert-x alert-danger col-sm-3'> حدث خطأ ما الرجاء المحاولة مرة اخري  </div>
     <?php }?>
     <?php
        if($wrong_password==true){?>
         <div class='alert-x alert alert-x alert-warning col-sm-3'>كلمة سر خاطئة الراجء التأكد من كلمة السر </div>
     <?php }?>
     <?php
        if($password_updated==true){?>
         <div class='alert-x alert alert-x alert-success col-sm-3'>تم تغيير الرقم السر </div>
     <?php }?>

 <?php }?>   
 </div>

</div>