<?php
	//start using session
	session_start();

	//connect with database
	include_once 'dbconnect.php';

	//check if form is submitted
	if (isset($_POST['login'])) {
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$passwd = mysqli_real_escape_string($conn,$_POST['password']);

		//sql command
		$query = "SELECT * FROM members WHERE 
				  email ='" . $email . "' AND 
				  password ='" . md5($passwd) . "'";
		//execute sql command
		$result = mysqli_query($conn, $query);
		//check whether there is result from table
		if ($row = mysqli_fetch_array($result)) {
			//store name in php session
			$_SESSION['user_name'] = $row['name'];
			header("location: index.php");
		} else {
			$error_msg = "Incorrect email or password!";
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>PHP Login</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">PHP Simple CRUD</a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<li><a href="admin_login.php">Admin</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="login.php" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>

					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<!--display message -->
			<span class="text-danger">
			<?php 
				if (isset($error_msg)) {
					echo $error_msg;
				}
			?>
			</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		New User? <a href="register.php">Sign Up Here</a>
		</div>
	</div>
</div>
</body>
</html>
