<?php
  include_once("connection.php");
 ?>

<!DOCTYPE html>
<html>
  <head>
      <title>Attendence</title>

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

            <th>Name</th>
            <th>Father's Name</th>
            <th>Email</th>
            <th>Attendance</th>

          </thead>

          <tbody>

<?php

  $query = "SELECT * FROM emp";
  $result = $link->query($query);
  while($show=$result->fetch_assoc()){

 ?>

            <tr>
              <td> <?php echo $show['name'];  ?> </td>
              <td> <?php echo $show['fname'];  ?> </td>
              <td> <?php echo $show['email'];  ?> </td>

              <td>
                Present <input type="radio" required name="attendance[<?php echo $show['emp_id'] ?>]" value="Present">
                Absent <input type="radio" required name="attendance[<?php echo $show['emp_id']; ?>]" value="Absent">
              </td>

            </tr>
  <?php } ?>

</tbody>



<?php

  if(isset($_POST['attendance']) or !empty($_POST['attendance'])) {
    $att = $_POST['attendance'];
  }
  else {
    $att = [];
  }
    $date = date('d-m-y');

    $query = "SELECT distinct date FROM attendance";
    $result = $link->query($query);
    $b = false;

    if($result->num_rows > 0){
    while($check=$result->fetch_assoc()){

      if($date == $check['date']){
        $b = true;
        echo "<div class='alert alert-danger'>

          Attendance Already Taken Today!!!

         </div>";
      }

    }

  }

      if(!$b){
        $insertResult = false;
        foreach ($att as $key => $value) {
          if($value == 'Present'){

            $query = "INSERT INTO attendance(value, emp_id, date) VALUES('Present', $key, '$date')";
            $insertResult = $link->query($query);

          }
           else{

             $query = "INSERT INTO attendance(value, emp_id, date) VALUES('Absent', $key, '$date')";
             $insertResult = $link->query($query);

          }
        }

        if($insertResult){

          echo "<div class='alert alert-success'>

            Attendance Taken Successfully!!!;

           </div>";

        }

      }


 ?>

        </table>
        <input class="btn btn-primary" type="submit" value="Take Attendance">
      </form>

      </div>

      <div class="panel-footer">

      </div>

    </div>



  </body>
</html>
