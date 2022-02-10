<?php 
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
if(isset($loginMsg))
{
?>
<div class="alert alert-success">
  <strong><?php echo $loginMsg; ?></strong>
</div>
<?php
}
?>
<form method="post" class="form horizontal">

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
    You don't have an account? register here <a href="register.php"><p class ="text-info">Register Account</p></a>
</div>
</div>

</form>