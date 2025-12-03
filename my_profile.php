<?php
include("connection.php");
session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
     <meta charset="UTF-8">
     <title>My Profile</title>
     <link rel="stylesheet" href="my_profile.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
     <div class="back-btn">
          <button type="button" onclick="history.back()">Back</button>
     </div>

     <div class="container">
          <img class="logo" src="logo2.jpg">
          <div class="title">My Profile</div>
          <hr>
          <?php
          $sql = "SELECT * FROM `reg` WHERE Enr_no ='$_SESSION[enr_no]'";
          $que = mysqli_query($conn, $sql);
          if ($rows = mysqli_fetch_assoc($que)) {
               echo "<br>";
               echo "<b>";
               echo "<table border = 30>";
               echo "<tr>";

          ?>
              <center><img src="./image/<?php echo $rows['profile_picture'] ?>"></center>
              <br><br>
          <?php
               echo "<br>";
               echo "</tr>";
               echo "<tr>";
               echo "<td>";
               echo "<b> Enrollment No </b>";
               echo "</td>";
               echo "<td>";
               echo $rows['Enr_no'];
               echo "</td>";
               echo "</tr>";

               echo "<tr>";
               echo "<td>";
               echo "<b> Name</b>";
               echo "</td>";

               echo "<td>";
               echo $rows['Name'];
               echo "</td>";
               echo "</tr>";

               echo "<tr>";

               echo "<td>";
               echo "<b>Gender</b>";
               echo "</td>";

               echo "<td>";
               echo $rows['Gender'];
               echo "</td>";
               echo "</tr>";

               echo "<tr>";
               echo "<td>";
               echo "<b>Email Id</b>";
               echo "</td>";

               echo "<td>";
               echo $rows['Email'];
               echo "</td>";
               echo "</tr>";

               echo "<tr>";
               echo "<td>";
               echo "<b>Status</b>";
               echo "</td>";

               echo "<td>";
               echo $rows['status'];
               echo "</td>";
               echo "</tr>";

               echo "</table>";
               echo "</b>";
          }
          echo "<h2><b>Education Detail</b></h2>";
          $que = "SELECT * FROM `edu` WHERE Enr_no = '$_SESSION[enr_no]'";
          $res = mysqli_query($conn, $que);
          if ($row = mysqli_fetch_assoc($res)) {
               echo "<br>";
               echo "<b>";
               echo "<table border = 30>";

               echo "<tr>";
               echo "<td>";
               echo "<b> Standard </b>";
               echo "</td>";
               echo "<td>";
               echo $row['standard'];
               echo "</td>";
               echo "</tr>";

               echo "<tr>";
               echo "<td>";
               echo "<b> Seat No</b>";
               echo "</td>";

               echo "<td>";
               echo $row['seat_no'];
               echo "</td>";
               echo "</tr>";

               echo "<tr>";

               echo "<td>";
               echo "<b>Passing Year</b>";
               echo "</td>";

               echo "<td>";
               echo $row['passing_year'];
               echo "</td>";
               echo "</tr>";

               echo "<tr>";
               echo "<td>";
               echo "<b>Board</b>";
               echo "</td>";

               echo "<td>";
               echo $row['board'];
               echo "</td>";
               echo "</tr>";

               echo "<tr>";
               echo "<td>";
               echo "<b>Percentage</b>";
               echo "</td>";

               echo "<td>";
               echo $row['percentage'];
               echo "</td>";
               echo "</tr>";

               echo "</table>";
               echo "</b>";
          }

          mysqli_close($conn);
          ?>
     </div>
</body>

</html>