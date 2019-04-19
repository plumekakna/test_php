<?php

//connect with database
include_once 'dbconnect.php';

  $query = "SELECT * FROM txt";
  $result = mysqli_query($conn,$query);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Header</th>
                <th>Post</th>
                <th>Photo</th>

            </tr>
        </thead>
        <tbody>
        <tr>
        <?php while ($row = mysqli_fetch_array($result)) {?>
          <td><?php echo $row['id'];?></td>
           <td><?php echo $row['headerT'];?></td>
           <td><?php echo $row['txtT'];?> </td>
           <td> <img src="img/<?php echo $row['T_img'];?>" width="100px" height="100px" alt="p"></td>

        </tr>
        <?php } ?>
        </tbody>
    </table>
  </body>
</html>
