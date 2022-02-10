<?php
require_once "./user.php";


if(isset($_REQUEST["btn_register"]))
{
    $username = strip_tags($_REQUEST["txt_username"]);
    $email = strip_tags($_REQUEST["txt_email"]);
    $password = strip_tags($_REQUEST["txt_password"])

if(empty($username)){
    $errorMsg[]="Please enter username";
}
else if empty($email)){
    $errorMsg[]= "Please enter email";

}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errorMsg[]= "Please enter a valid email address";
}
else if (empty($password)){
    $errorMsg[]="Please enter password";
}
else if (strlen($password)< 6){
    $errorMsg[]= "Password must have at least 6 characters";
}
else{
    try{
       $user = create_user(array("username"=>$username,"email"=>$email,"password"=>$password))
       if($user){
           $registerMsg ="Register Successfully";
           $_SESSION["user_login"] = $user["id"];
           $logMsg = "Successfull Login";
           header("location: welcome.php");
          
       }
    }
     
    catch(PDOException $e){
        $e->getMessage();
    }

}
}
?>