<?php
  include_once("connection.php");

  if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

    // if($username == 'admin' || $password == 'admin')
    //   header('Location:abc.php');
    // else
    //   header('Location:bcd.php');
  }

 ?>

<!DOCTYPE html>
<html>
  <head>
      <title></title>

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="style.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>

    <div class="panel panel-default container">

        <div class="login-box">
          <img src="avatar.png" class="avatar">
            <h1>Login Here!</h1>

            <form action="attendance.php" method="post">
              <p>Username</p>
              <input type="text" name="username" placeholder="Enter Username">
              <p>Password</p>
              <input type="password" name="password" placeholder="Enter Password">
              <input type="submit" name="submit" value="Login">
              <a href="#">Forget Password</a>
            </form>

        </div>

    </div>



  </body>
</html>
