<?php 
    session_start();

    include_once 'dbconnect.php';

    $query = "SELECT * FROM members ORDER BY id DESC";
    $result = mysqli_query($conn,$query);
    //delete record
    if(isset($_GET['id'])){
        $query = "DELETE FROM members
                 WHERE id = ".$_GET['id'];
        
        mysqli_query($conn,$query);
        header("Location:show_user.php");
    }

?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" >
     <title>PHP Admin | Users</title>
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
         <div class="col-xs-8 col-xs-offset-2">
             <legend>Show All Users</legend>

            <div class="table-responsive">
             <table class="table table-bordered table-hover">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>User Name</th>
                         <th>E-Mail</th>
                         <th>Password</th>
                         <th colspan="2" style="text-align:center">Actions</th>
                     </tr>
                 </thead>
                 <tbody>
                 <tr>
                 <?php while ($row = mysqli_fetch_array($result)) {?>

                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?> </td>
                    <td><?php echo $row['email'];?> </td>
                    <td><?php echo $row['password'];?> </td>
                    <td>
                    <input type="button" name="edit" value="Edit" class="btn btn-primary" onclick="">
                    </td>
                    <td>
                    <input type="button" name="delete" value="Delete" class="btn btn-primary" onclick="delete_user(<?php echo $row['id'];?>)">
                    </td>
                 </tr>
                 <?php } ?>
                 </tbody>
             </table>
            </div>
            <!--display number of records -->
            <div class="panel-footer"></div>
         </div>
     </div>
 </div>
 <script>
    function delete_user(id){
        if (confirm('Confirm to delete this ID')){
            window.location.href="show_user.php?id="+id;
        }
    }
 </script>
 </body>
 </html>
