<?php 
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
require_once "./app/user.php";
$userActions = new user();
$username = $password = "";
$username_err = $password_err = $login_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty($username_err) && empty($password_err)){
      $redirect = NULL;
      if($_POST['location'] != '') {
        $redirect = $_POST['location'];
      }
    $user =$userActions->get_user_by_name($username);
    if(!empty($user)){
      if($user["username"] == $username){
          if(password_verify($password,$user["password"])){
              session_start();
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
              if(isset($redirect)) {
                $url = 'login.php';
                $url .= '&location=' . urlencode($redirect);
                
                header("Location: " . $url);
                exit;
                
            }else{                   
              header("location: index.php");
              exit;
          } 
      }else{
          $login_err = "Invalid username or password.";  
      }
  }else{
    $login_err = "Invalid username or password.";
}
}else{
    echo "Oops! Something went wrong. Please try again later.";
}
}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
       <title>Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link href="./css/style.css" rel="stylesheet" type="text/css">

	</head>
  <body>
<div class="wrapper">
    <h2>Login</h2>
    <p>Please fill in your credentials to login.</p>

    <?php 
    if(!empty($login_err)){
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }        
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>    
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <?php if(isset($_GET['location'])) {?>
          <input type="hidden" name="location" value=<?php echo "'".trim($_GET['location'])."'";?> />
      <?php }
      ?>
      <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
  </form>
</div>
</body>
</html>