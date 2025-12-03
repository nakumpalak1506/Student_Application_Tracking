<?php
session_start();
if (!isset($_SESSION['enr_no']) || ($_SESSION['enr_no'] != true)) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(b1.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      background-position: center;
      height: 150vh;
      padding: 20px;
      color: #fff;
    }

    .navbar {
      overflow: hidden;
      background-color: #333;
      padding: auto 2px;
      padding-left: 2px;
      width: auto;
    }

    .navbar a {
      float: right;
      font-size: 16px;
      color: white;
      text-align: center;
      padding: 5px;
      padding-top: 5px;
      text-decoration: none;
    }

    .logout a {
      padding-top: 20px;
      padding-right: 20px;

    }

    .dropdown {
      float: left;
      overflow: hidden;
      padding-left: 10px;
    }

    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .navbar a:hover,
    .dropdown:hover .dropbtn {
      background-color: red;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: red;
    }

    .dropdown:hover .dropdown-content {
      display: block;
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
</head>

<body>

  <div class="navbar">
    <div class="logout">
      <a href="http://localhost/project/logout.php">Logout</a>
    </div>
    <div class="dropdown">
      <button class="dropbtn"><a href="">Faculty</a>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="http://localhost/project/faculty.php">Add</a>
        <a href="http://localhost/project/faculty_remove.php">Remove</a>
        <a href="http://localhost/project/view_faculty.php">View Faculty</a>
        <a href="http://localhost/project/view_student.php">View Student</a>

      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn"><a href="#">Student</a>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="http://localhost/project/pending_student.php">View Pending Student</a>
        <a href="http://localhost/project/approve_student.php">View Approved Student</a>
        <a href="http://localhost/project/reject_student.php">View Rejected Student</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn"><a href="http://localhost/project/a_timetable.php">Timetable</a>
        <i class="fa fa-caret-down"></i>
      </button>
    </div>

    <div class="dropdown">
      <button class="dropbtn"><a href="http://localhost/project/a_event.php">Event</a>

        <i class="fa fa-caret-down"></i>
      </button>

    </div>
    <div class="dropdown">
      <h4 style="padding-right: 500px; padding-left:50px;">Welcome Admin</h4>
    </div>
  </div>
  <br>


  <?php
  include("connection.php");
  $sql = "SELECT * FROM `reg` WHERE `role` = 'Student'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Enrolment no</th>";
    echo "<th>Name</th>";
    echo "<th>email</th>";
    echo "<th>Role</th>";
    echo "<th>Approval Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<td>" . $row['Enr_no'] .= "</td>";
      echo "<td>" . $row['Name'] . "</td>";
      echo "<td>" . $row['Email'] . "</td>";
      echo "<td>" . $row['role'] . "</td>";
      echo "<td>" . $row['status'] . "</td>";
      echo "<td>";
  ?>
     <form method="post" action="user_approve_form.php">
        <button class="button approve" name="action">Action</button>
      </form>

  <?php

      echo "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  else{
    echo "Data Not Found";
  }

  ?>

</body>

</html>
<?php mysqli_close($conn); ?>