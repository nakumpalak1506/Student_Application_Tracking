<?php
require("connection.php");

$result = mysqli_query($conn, "SELECT * FROM `fees` WHERE Status = 'Rejected'");

// Display the list of pending students
?>
<body>
<div class="back-btn">
    <button type="btn-back" type="button" onclick="history.back()">Back</button>
  </div>
<?php
if (mysqli_num_rows($result) > 0) {
  echo "<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: #fff;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-position: center;
    height: 60vh;
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
  }

  .btn-approve {
    position: absolute;
    left: 650px;
  }

  .btn-back {
    height: 8%;
    width: 8%;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 12px;
    cursor: pointer;
    background-color: green;
    padding: 10px 10px;
    text-decoration: none;
    display: inline-block;
  }

  button:hover {
    background: gray;
  }
</style>";
  echo "<table>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>Enroolment no</th>";
  echo "<th>Name</th>";
  echo "<th>Phone No</th>";
  echo "<th>Approval Status</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  echo "<tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<td>" . $_SESSION['Semester_id'] = $row['Semester_id'] . "</td>";
    echo "<td>" . $_SESSION['Name'] = $row['Name'] . "</td>";
    echo "<td>" . $_SESSION['Student_id'] = $row['Student_id'] . "</td>";
    echo "<td>" . $_SESSION['status'] = $row['Status'] . "</td>";
?>
<?php

    echo "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  $_SESSION['error'] = "Data Not founded";
}
mysqli_close($conn);
?>
</body>
  

