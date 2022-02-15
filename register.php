<?php include "./header.php";
if(isset($_POST['register'])){
  if(empty(trim($_POST["username"]))){
    $erroMsg[] = "Please enter username.";
  }

  else if(empty(trim($_POST["password"]))){
    $erroMsg[] ="Please enter your password.";
    
  } 
  else if(empty(trim($_POST["email"]))){
    $erroMsg[] ="Please enter your email.";
  }else if (!filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
    $erroMsg[] = "Invalid email format";
  }

}

?>
<?php
    if(!empty($erroMsg)){
        echo "<div class='alert alert-danger'>";
        foreach ($erroMsg as $error) {
            echo "<span class='glyphicon glyphicon-remove'></span>&nbsp;".$error."<br>";
        }
        echo "</div>";
    }
?>
<body>
	<nav class="navbar navbar-default">
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form action="./app/create_user.php" method="POST">	
				<h4 class="text-success">Register here...</h4>
				<hr style="border-top:1px groovy #000;">
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control" name="register">Register</button>
				</div>
				<a href="login.php">Login</a>
			</form>
		</div>
	</div>
</body>
</html>