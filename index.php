<?php
	//start using session
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home | PHP Simple CRUD</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">PHP Simple CRUD</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<!--show login-->
			<?php if(isset($_SESSION['user_name'])) { ?>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['user_name']; ?></li>
				<li><a href="add_text.php">add</a></li>
				<li><a href="logout.php">Log Out</a></li>
			<?php } else { ?>
				<li><a href="add_text.php">add</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<li><a href="admin_login.php">Admin</a></li>
			<?php } ?>
			</ul>
		</div>
	</div>
</nav>
</body>
</html>
