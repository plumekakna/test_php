<?php
    session_start();
    //connect with database
    include_once 'dbconnect.php';

    if (isset($_SESSION['user_name'])) {
      //insert data to database
    if (empty($_POST['submitT'])) {

    } else {
        if (isset($_POST['submitT'])) {
        //3.save data into members table
        $headerT = $_POST['headerT'];
        $txtT = $_POST['txtT'];

        //upload image
        $ext = pathinfo(basename($_FILES['T_img']['name']), PATHINFO_EXTENSION);
        $new_image_name = 'img_' .uniqid(). "." .$ext;
        $image_path = "img/";
        $upload_path = $image_path.$new_image_name;
        //uploading
        $success = move_uploaded_file($_FILES['T_img']['tmp_name'],$upload_path);
        if ($success==FALSE) {
          echo "can not upload";
          exit();
        }
        $T_img = $new_image_name;

        $query = "INSERT INTO txt(headerT,txtT,T_img)
              VALUES('" . $headerT . "','" . $txtT . "','" . $T_img . "')";

              if (mysqli_query($conn, $query)) {
                $msg_success = "Successfully
                <a href='login.php'>Click here to login</a>";
              } else {
                $msg_error = "Error";
              }
              header("location:Travel.php");
      }

    }

    } else {

    header("location:login.php");
    }


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" enctype="multipart/form-data" action="add_text.php" method="post" name="addtxt">
      <input type="text" name="headerT" placeholder="หัวข้อ" class="form-control"> <br>
      <textarea name="txtT" rows="8" cols="80" placeholder="ข้อความ" required class="form-control"></textarea> <br>
      <input type="file" name="T_img" value=""> <br>
      <input type="submit" name="submitT" value="submit">
    </form> <br> <br>



  </body>
</html>
