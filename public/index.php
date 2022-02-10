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
if(isset($loginMsg))
{
?>
<div class="alert alert-success">
  <strong><?php echo $loginMsg; ?></strong>
</div>
<?php
}
?>
<form method="post" class="form horizontal login">
  <label class="col-sm-3 control-label" for="username">
    <i class="fas fa-user"></i>
  </label>
  <input type="text" name="username" placeholder="Username or Email" id="username" required>
  <label class="col-sm-3 control-label" for="password">
    <i class="fas fa-lock"></i>
  </label>
  <input type="password" name="password" placeholder="Password" id="password" required>
<input type="submit" name="btn_login" class ="btn btn-success" value="Login">

</form>
<div class = "col-sm-offset-3 col-sm-9 m-t-15">
    You don't have an account? register here <a href="register.php"><p class ="text-info">Register Account</p></a>
</div>