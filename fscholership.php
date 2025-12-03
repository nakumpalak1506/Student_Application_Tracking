<?php
include('connection.php');
session_start();
$sql = "SELECT * FROM `scholarship`";
$result = mysqli_query($conn,$sql);

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

    .btn-reject {
      background-color: maroon;
      position: absolute;
      right: 10px;
      height: 8%;
      width: fit-content;
      text-align: center;
      padding-top: 1px;
    }

    .btn-approve {
      position: absolute;
      left: 650px;
      height: 8%;
      width: fit-content;
      text-align: center;
      padding-top: 1px;
    
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
  <title>Scholership</title>
</head>
<div class="back-btn">
      <button class="btn-back" type="button" onclick="history.back()">Back</button>
    </div>
<body>
<div class="list">
<h2 style="color: black; text-align:center; padding-top:30px;">Scholership Approve or Reject</h2>
    <form method="dialo" action="sch_approve_list.php">
      <button class="btn-approve">
        <h5>View Approved Student</h5>
      </button>
    </form>
    <form method="dialo" action="sch_reject_list.php">
      <button class="btn-reject">
        <h5>View Rejected Student</h5>
      </button>

    </form>
    <br><br><br><br>
 
  </div>
  <?php

  if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Application ID</th>";
    echo "<th>Appication Year</th>";
    echo "<th>Student Id</th>";
    echo "<th>Approval Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<td>" . $_SESSION['application_id'] = $row['Application_id'] . "</td>";
      echo "<td>" . $_SESSION['accedmic_year'] = $row['Accedmic_year'] . "</td>";
      echo "<td>" . $_SESSION['enr_no'] = $row['Enr_no'] . "</td>";
      echo "<td>" . $_SESSION['status'] = $row['status']. "</td>";
      echo "<td>";
  ?>
  <form method="post" action="sch_approve_form.php">
        <button class="button approve" name="action">Action</button>
      </form>
  <?php

      echo "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  else{
    echo "Data Not Found Founded in database";
  }
  mysqli_close($conn);
  ?>

  
</body>

</html>