<?php 
require "./header.php";
require_once "./app/user.php";
if(isset($errorMsg))
{
  foreach($errorMsg as $error)
  {
?>
<?php

$userActions = new user();
session_start();
$redirect = NULL;
if($_GET['location'] != '') {
    $redirect = $_GET['location'];
}
if(isset($_SESSION["user_login"])){
    if (!isset($redirect)){
    header("Location: index.php");
    exit();
    }
    else if(isset($redirect)){
    $url = urlencode($redirect);
    
    header("Location: " . $url);
    exit();

    }
}

if(isset($_REQUEST["btn_login"]))
{
    $username = strip_tags($_REQUEST["txt_username_email"]);
    $email = strip_tags($_REQUEST["txt_username_email"]);
    $password = strip_tags($_REQUEST["txt_password"]);

if(empty($username)|| empty($email)){
    $errorMsg[]= "please enter username or email";
}
else if (empty($password)){
    $errorMsg[]="please enter password";
}
else{
      if(!empty($username)){
          $user =$userActions->get_user_by_name($username);
          if(!empty($user)){
            if($user["username"] == $username){
                if(password_verify($password,$user["password"]))
                {
                    $_SESSION["user_login"] = $user["id"];
                    $logMsg = "Successfull Login";
                    header("refresh:2; index.php");
                    exit();
                }
                else{
                    $errorMsg[]="wrong password";
                }
            } 
          }
          else if(empty($user)){
            $errorMsg[]="This User is not registered in our app, redirecting to registration page";
            header("Location: ./register.php");
            exit();
          }
      }
      else if(!empty($email)){
          $user =$userActions->get_user_by_email($email);
          if(!empty($user)){
            if($user["email"] == $email){
                if(password_verify($password,$user["password"]))
                {
                    $_SESSION["user_login"] = $user["id"];
                    $logMsg = "Successfull Login";
                    if (!isset($redirect)){
                      header("refresh:2; index.php");
                      exit();
                      }
                      else if (isset($redirect)){
                      $url .= '&location=' . urlencode($redirect);
                      }
                      header("refresh:2; Location: " . $url);{
                  
                      exit();
                      }
                    
                }
                else{
                    $errorMsg[]="wrong password";
              }
          } 
      
      else{
          $errorMsg[]="wrong username or email";
      }
    }
    if(empty($user)){
      $errorMsg[]="This User is not registered in our app, redirecting to registration page";
      header("Location: ./register.php");
      exit();
    }
  }
}
}
?>
<div class = "alert alert-danger">
  <strong><?php echo $error; ?></strong>
</div>
<?php
  }
} 
if(isset($loginMsg))
{
?>
<div class="alert alert-success">
  <strong><?php echo $loginMsg; ?></strong>
</div>
<?php
}
?>
<form method="post" class="form horizontal" >

<div class="form-group">
  <lable class="col-sm-3 control-label">Username or Email</lable>
  <div class="col-sm-6">
    <input type="text" name="text_username_email" class ="form-control" placeholder="Enter username or email"/>
  </div>
</div> 

<div class="form-group">
  <lable class="col-sm-3 control-label">Password</lable>
  <div class="col-sm-6">
    <input type="text" name="text_password" class ="form-control" placeholder="Enter Password"/>
  </div>
</div> 

<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <input type="submit" name="btn_login" class ="btn btn-success" value="Login">
  </div>
</div> 

<div class="form-group">
  <div class = "col-sm-offset-3 col-sm-9 m-t-15">
    You don't have an account? register here: <a href="./register.php"><p class ="text-info">Register Account</p></a>
</div>
</div>

</form>