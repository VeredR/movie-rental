<?php
require "./header.php";
require_once "./user.php";
session_start();

if isset($_SESSION["user_login"]){
    header("location: index.php");
}

if(isset($_REQUEST["btn_login"]))
{
    $username = strip_tags($_REQUEST["txt_username_email"]);
    $email = strip_tags($_REQUEST["txt_username_email"]);
    $password = strip_tags($_REQUEST["txt_password"])

if(empty($username)or empty($email)){
    $errorMsg[]= "please enter username or email";

}
else if (empty($password)){
    $errorMsg[]="please enter password";
}
else{
    try{
        if !empty($username){
            $user =$userHelp->get_user_by_name($username)
            if ($user["username"] == $username){
                if(password_verify($password,$user["password"]))
                {
                    $_SESSION["user_login"] = $user["id"];
                    $logMsg = "Successfull Login";
                    header("refresh:2; index.php");
                }
                else{
                    $errorMsg[]="wrong password";
                }
            } 

        }
        else if !empty($email){
            $user =get_user_by_email($email);
            if ($user["email"] == $email){
                if(password_verify($password,$user["password"]))
                {
                    $_SESSION["user_login"] = $user["id"];
                    $logMsg = "Successfull Login";
                    header("refresh:2; index.php");
                }
                else{
                    $errorMsg[]="wrong password";
                }
            } 
        }
        else{
            $errorMsg[]="wrong username or email";
        }
    }
    catch(PDOException $e){
        $e->getMessage();
    }

}
}
?>