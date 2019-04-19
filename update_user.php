<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
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
				<li><a href="register.php">Sign Up</a></li>
				<li class="active"><a href="admin_login.php">Admin</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="#" method="post" name="updateform">
				<fieldset>
					<legend>Update</legend>

          <!--14.display old info in text fields -->
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Enter Full Name" required class="form-control" />
						<span class="text-danger"></span>
					</div>

					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email" required class="form-control" />
						<span class="text-danger"></span>
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Password" minlength="6" required class="form-control" />
						<span class="text-danger">></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" minlength="6" required class="form-control" />
						<span class="text-danger"></span>
					</div>

					<div class="form-group">
						<input type="submit" name="update" value="Update" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<!--display message -->
			<span class="text-success"></span>
			<span class="text-danger"></span>
		</div>
	</div>
</div>
</body>
</html>