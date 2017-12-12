<?php
if(is_student_login() === TRUE){
    if($open_app === "cv" || $open_app === "logout"){
        goto ModuleOnly;
    }else{
        require("layout/layout_html.php");
    }
}else{
    ModuleOnly:
    require("modules/{$open_app}.php");
}
?>