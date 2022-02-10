<?php 
require "./header.php";
if(isset($errorMsg))
{
  foreach($errorMsg as $error)
  {
?>
<div class = "alert alert-danger">
  <strong><?php echo $error; ?></strong>
</div>
<?php   
    }
}
if(isset($registerMsg))
{
?>
<div class="alert alert-success">
  <strong><?php echo $registerMsg; ?></strong>
</div>
<?php
}
?>
<form method="post" class="form horizontal">

<div class="form-group">
  <lable class="col-sm-3 control-label">Username</lable>
  <div class="col-sm-6">
    <input type="text" name="text_username" class ="form-control" placeholder="Enter username or email"/>
  </div>
</div> 

<div class="form-group">
  <lable class="col-sm-3 control-label">Email</lable>
  <div class="col-sm-6">
    <input type="text" name="text_email" class ="form-control" placeholder="Enter username or email"/>
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
    <input type="submit" name="btn_register" class ="btn btn-primary" value="Register">
  </div>
</div> 

<div class="form-group">
  <div class = "col-sm-offset-3 col-sm-9 m-t-15">
   You already have an account registered here? <a href="index.php"><p class ="text-info">Login To Account</p></a>
</div>
</div>

</form>