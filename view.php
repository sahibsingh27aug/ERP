<?php
  include_once("connection.php");
 ?>

<!DOCTYPE html>
<html>
  <head>
      <title></title>

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
        <a href="attendance.php" class="btn btn-primary">Back</a>
        <a href="add.php" class="btn btn-primary pull-right">Add</a>

        <br><br>

      <form method="post">

        <table class="table">
          <thead>

            <th>S.No.</th>
            <th>Date</th>
            <th>View</th>

          </thead>

<?php

  $query = "SELECT distinct date FROM attendance";
  $result = $link->query($query);

  if($result->num_rows > 0){
      $i = 0;

      while($val = $result->fetch_assoc()) {
        $i++;

 ?>

          <tr>

            <td><?php echo $i; ?></td>
            <td><?php echo $val['date']; ?></td>
            <td> <a href="viewp.php?date=<?php echo $val['date']; ?>" class="btn btn-primary">View</a> </td>

          </tr>
<?php } } ?>

      </div>

      <div class="panel-footer">

      </div>

    </div>



  </body>
</html>
