<?php
  include_once("connection.php");
 ?>

<!DOCTYPE html>
<html>
  <head>
      <title>Attendance</title>

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
      <link rel="stylesheet" href="assets/css/style.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <script src="bootstrap/bootstrap.min.js"></script>
        <script src="bootstrap/jquery.min.js"></script> -->
  </head>
  <body>

    <div class="panel panel-default container">

      <div class="panel-heading">
        <h1 style="text-align: center;">Attendance Management System</h1>
      </div>

      <div class="panel-body">

<?php

    if(isset($_POST['add_btn'])){
  // if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];



    if($name == "" || $fname == "" || $email == ""){
      echo "<div class='alert alert-danger'>

        Fields Must Not Be Empty;

       </div>";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      echo "<div class='alert alert-danger'>

        Invalid Email Format;

       </div>";
    }

    else{
        $query = "INSERT INTO emp(name,fname,email) VALUES('$name', '$fname', '$email')";
        $result = $link->query($query);

        if($result){
          echo "<div class='alert alert-success'>

            Data Inserted Successfully;

           </div>";
         }
    }

  }

 ?>

      <form method="post">
        <a href="attendance.php" class="btn btn-primary">View</a>
        <a href="attendance.php" class="btn btn-primary pull-right">Back</a>
        <br><br>

          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">Father's Name:</label>
            <input type="text" name="fname" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">Email:</label>
            <input type="text" name="email" class="form-control">
          </div>

          <input type="submit" name="add_btn" class="btn btn-primary">
        </form>
      </div>

      <div class="panel-footer">

      </div>

    </div>



  </body>
</html>
