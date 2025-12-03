<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Namo-e-tabReport</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(pl.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      background-position: center;
      height: 150vh;
      padding: 20px;
      color: #fff;
    }

    table {
      height: 50%;
      width: 50%;
      text-align: center;
      padding-top: 10px;

    }

    h3 {
      text-align: center;
      padding-top: 100px;
    }

    button {
      height: 8%;
      width: 8%;
      border-radius: 5px;
      border: none;
      color: #fff;
      font-size: 12px;
      font-weight: 100;
      cursor: pointer;
      background-color: darkblue;
      position: absolute;
      top: 10px;
      left: 10px;
      padding: 15px 32px;
      text-decoration: none;
      display: inline-block;

    }

    button:hover {
      background: gray;
    }
  </style>
</head>

<body>
  <div class="button">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <h3>Namo-e-tab Report</h3>

  <center>

    <?php
    $s = "SELECT * FROM `namo-e-tab` WHERE Enr_no ='$_SESSION[enr_no]'";
    $q = mysqli_query($conn, $s);
    if ($raw = mysqli_fetch_assoc($q)) {
      echo "<b>";
      echo "<table border = 30>";

      echo "<tr>";

      echo "<td>";
      echo "<b> Semester </b>";
      echo "</td>";

      echo "<td>";
      echo $raw['Semester_id'];
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>";
      echo "<b>name</b>";
      echo "</td>";

      echo "<td>";
      echo $raw['name'];
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>";
      echo "<b>Enrollment No</b>";
      echo "</td>";

      echo "<td>";
      echo $raw['Enr_no'];
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>";
      echo "<b>application no</b>";
      echo "</td>";

      echo "<td>";
      echo $raw['Application no'];
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>";
      echo "<b>Mobile No</b>";
      echo "</td>";

      echo "<td>";
      echo $raw['Mobile_no'];
      echo "</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>";
      echo "<b>status</b>";
      echo "</td>";

      echo "<td>";
      echo $raw['status'];
      echo "</td>";
      echo "</tr>";

      echo "</table>";
      echo "</b>";
    } else {
      echo "error";
    }
    mysqli_close($conn);
    ?>
  </center>
</body>

</html>