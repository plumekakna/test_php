<?php
	//2.connect with database
	include_once 'dbconnect.php';

	if (isset($_POST['signup'])) {
		//3.save data into members table
		$name = mysqli_real_escape_string($conn,$_POST['member-name']);
		$email = $_POST['member-email'];
		$passwd = $_POST['member-password'];
		$cpasswd = $_POST['cmember-password'];

		if ($passwd != $cpasswd) {
			$passwd_error = "Password and confirm password don't match!";
		} else {
			$query = "INSERT INTO members(name,email,password)
				  VALUES('" . $name . "','" . $email . "','"
				  . md5($passwd) . "')";

			if (mysqli_query($conn, $query)) {
				$msg_success = "Successfully registered! 
				<a href='login.php'>Click here to login</a>";
			} else {
				$msg_error = "Error in registration, please try again!";
			}
		}
		

					 
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
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
				<li><a href="login.php">Login</a></li>
				<li class="active"><a href="register.php">Sign Up</a></li>
				<li><a href="admin_login.php">Admin</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Sign Up</legend>

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="member-name" placeholder="Enter Full Name" required class="form-control" />
						<span class="text-danger"></span>
					</div>

					<div class="form-group">
						<label for="name">Email</label>
						<input type="email" name="member-email" placeholder="Email" required class="form-control" />
						<span class="text-danger"></span>
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="member-password" placeholder="Password" minlength="6" required class="form-control" />
						<span class="text-danger"></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cmember-password" placeholder="Confirm Password" minlength="6" required class="form-control" />
						<span class="text-danger">
						<?php 
							if (isset($passwd_error)) {
								echo $passwd_error;
							}
						?>
						</span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<!--display message -->
			<span class="text-success">
			<?php
				if (isset($msg_success)) {
					echo $msg_success;
				}
			?>
			</span>
			<span class="text-danger">
			<?php 
				if (isset($msg_error)) {
					echo $msg_error;
				}
			?>
			</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>
</div>
<script>
	var passwd = document.getElementById("member-password").value
	var cpasswd = document.getElementById("cmember-password").value
	if (passwd != cpasswd) {
		document.getElementById("msg-cpasswd").innerHTML = "Password not match!"
	}
</script>
</body>
</html>
