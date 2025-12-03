<?php
include('connection.php');
session_start();

//$_SESSION['semester_id'] =$Semester_id;
$l = "SELECT * FROM `timetable`";
$result = mysqli_query($conn, $l);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background:white;
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      background-position: center;
      height: 150vh;
      padding: 20px;
      color: #fff;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
      color: black;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    /* Style for the buttons */
    .button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 8px 16px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer;
    }

    .approve {
      background-color: #4CAF50;
    }

    .reject {
      background-color: #f44336;
    }

    form button {
      color: #fff;
      background-color: darkblue;
      margin-left: 260px;
      padding: 7px 8px;
      display: flexbox;
      pointer-events: painted;
      width: fit-content;
      height: fit-content;
    }

    form button:hover {
      background-color: gray;
    }

    .btn-pending {
      background-color: maroon;
      position: absolute;
      right: 60px;
      margin-top: 8px;
      width: fit-content;
    }

    .btn-approve {
      position: absolute;
      left: 650px;
      margin-top: 8px;
      width: fit-content;
    }

    .btn-back {
      height: 6%;
      width: 8%;
      border-radius: 5px;
      border: none;
      color: #fff;
      font-size: 12px;
      cursor: pointer;
      background-color: green;
      position: absolute;
      padding: 10px 10px;
      text-decoration: none;
      display: inline-block;
      margin-top: 10px;

    }
    

    button:hover {
      background: gray;
    }
  </style>
  <title>Time Table</title>
</head>

<body>
    <div class="back-btn">
      <button type="btn-back" type="button" onclick="history.back()">Back</button>
    </div>
    <br><br><br>
  <div class="list">
  <h2 style="color: black; text-align:center;padding-top :10px;">Time Table Approve or Reject</h2>
    <form method="dialo" action="time_table_approve_list.php">
      <button class="btn-approve">
        <h6>View Approved TimeTable </h6>
      </button>

    </form>
    <form method="dialo" action="time_table_reject_list.php">
      <button class="btn-pending">
        <h6>View Reject TimeTable</h6>
      </button>
    </form>
  </div>
  <br>
  <br>
  <br>
  <br><br>

  <?php

  if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Term</th>";
    echo "<th>Department_id</th>";
    echo "<th>Division</th>";
    echo "<th>Approval Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['Term'] . "</td>";
      echo "<td>" . $row['Department_id'] . "</td>";
      echo "<td>" . $row['division'] . "</td>";
      echo "<td>" . $row['status'] . "</td>";
      echo "<td>";
  ?>
      <form method="post" action="timetable_approve_form.php">
        <button class="button approve" name="action">Action</button>
      </form>
  <?php

      echo "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "No Record found in database";
  }
  mysqli_close($conn);
  ?>
  <br>
  

</body>

</html>