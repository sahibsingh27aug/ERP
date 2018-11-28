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
        <a href="view.php" class="btn btn-primary">View</a>
        <a href="add.php" class="btn btn-primary pull-right">Add</a>

        <br><br>

      <form method="post">

        <table class="table">
            <thead>

              <th>S.No.</th>
              <th>Name</th>
              <th>Father's Name</th>
              <th>Email</th>
              <th>Attendance</th>

            </thead>

<?php

  if($_GET['date']){
    $date = $_GET['date'];

    $query = "SELECT emp.*, attendance.*
              FROM attendance
              INNER JOIN emp ON attendance.emp_id = emp.emp_id AND attendance.date='$date'";

    $result = $link->query($query);

    if($result->num_rows > 0){
        $i = 0;

        while($val = $result->fetch_assoc()) {
          $i++;

 ?>

          <tr>

            <td><?php echo $i; ?></td>
            <td><?php echo $val['name']; ?></td>
            <td><?php echo $val['fname']; ?></td>
            <td><?php echo $val['email']; ?></td>

            <td>

              Present <input type="radio" value="Present"
                <?php
                    if($val['value'] == 'Present')             // value is attendence table attribute which show Present/Absent, & $val contain whole array
                      echo "Checked";
                ?>
              >

              Absent <input type="radio" value="Absent"
                <?php
                    if($val['value'] == 'Absent')             // value is attendence table attribute which show Present/Absent, & $val contain whole array
                      echo "Checked";
                ?>
              >

            </td>

          </tr>
<?php } } } ?>

      </div>

      <div class="panel-footer">

      </div>

    </div>



  </body>
</html>
