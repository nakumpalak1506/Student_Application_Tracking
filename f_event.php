<?php
include('connection.php');
session_start();
if (!isset($_SESSION['enr_no']) || ($_SESSION['enr_no']!=true)) {
  header("Location: login.php");
  exit;
}

//$enr_no = $_SESSION['enr_no'];
$sql = "SELECT * FROM `event` WHERE Status ='Pending'";
$result = mysqli_query($conn, $sql);
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
      background-image: #fff;
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
      margin-left: 300px;
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
      right: 10px;
      height: 6%;
      width: 7%;
    }

    .btn-approve {
      position: absolute;
      left: 850px;
      height: 6%;
      width: 8%;
    
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

    }

    button:hover {
      background: gray;
    }
  </style>
  <title>Icard</title>
</head>

    <div class="back-btn">
      <button type="btn-back" type="button" onclick="history.back()">Back</button>
    </div>

<body>
  <div class="list">
    <form method="dialo" action="e_approve_list.php">
      <button class="btn-approve">
        <h5>View Approved Student</h5>
      </button>

    </form>
    <form method="dialo" action="e_reject_list.php">
      <button class="btn-pending">
        <h5>View Rejected Student</h5>
      </button>
    </form>
  </div>
<div>
  <br>
  <br>
  <br>
  <br>
  <?php

  if (mysqli_num_rows($result) > 0) {
    
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Event id</th>";
    echo "<th>Event Date</th>";
    echo "<th>Event detail</th>";
    echo "<th>Approval Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<td>" . $_SESSION['event_id'] = $row['Event_id'] . "</td>";
      echo "<td>" . $_SESSION['event_date'] = $row['Event_date'] . "</td>";
      echo "<td>" . $_SESSION['event_details'] = $row['Event_details'] . "</td>";
      echo "<td>" . $_SESSION['status'] = $row['Status'] . "</td>";
      echo "<td>";
  ?>
      <form method="post" action="e_approve.php">
        <button class="button approve" name="approve">Approve</button>
        <button class="button reject">Reject</button>
      </form>
  <?php

      echo "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "<script> 
					alert('data not found');
					window.open('facultydashboard.php','_self');
				  </script>";
  }
  mysqli_close($conn);
  ?>
  </div>

</body>

</html>