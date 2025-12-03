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
      padding-left: 2px;
      width: auto;
    }

    .navbar a {
      float: left;
      font-size: 16px;
      color: white;
      text-align: center;
      text-decoration: none;
      display: block;
    }

    .logout a {
      padding-top: 10px;
      padding-right: 20px;
      float: right;
      text-align: center;
      display: block;

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
      margin: 0
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
      display:block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: red;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .wrapper {
      width: 400px;
      margin: 0auto;
    }
    h3{
      text-justify: auto;
    }
  </style>
</head>

<body>
  <div class="navbar">
    <br>
    <br>
    <div class="logout">
      <a href="http://localhost/project/logout.php">Logout</a>
    </div>
    <div class="dropdown">
      <button class="dropbtn"><a href="">Icard</a>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="http://localhost/project/icard.php">Apply</a>
        <a href="http://localhost/project/i_update.php">Upadte</a>
        <a href="http://localhost/project/iview.php">View</a>
      </div>
    </div>
    <div class="logout">
      <a href="http://localhost/project/my_profile.php">My Profile</a>
    </div>


    <div class="dropdown">
      <button class="dropbtn"><a href="">Scholarship</a>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="http://localhost/project/scholarship.php">Apply</a>
        <a href="http://localhost/project/supdate.php">Upadte</a>
        <a href="http://localhost/project/siview.php">View</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn"><a href="">Namo-e-tab</a>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="http://localhost/project/namo.php">Apply</a>
        <a href="http://localhost/project/n_update.php">Upadte</a>
        <a href="http://localhost/project/n_iview.php">View</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn"><a href="http://localhost/project/edu.php">Education</a>
    </div>
    <div class="dropdown">
      <button class="dropbtn"><a href="http://localhost/project/view_timetable.php">Time Table</a>
    </div>
    <div class="dropdown">
      <button class="dropbtn"><a href="http://localhost/project/view_event.php">Event</a>
    </div>
    <div class="dropdown">
      <h4 class="dropbtn">Welcome <?php echo $_SESSION['enr_no']?></h4>
    </div>
  </div>

  
</body>

</html>