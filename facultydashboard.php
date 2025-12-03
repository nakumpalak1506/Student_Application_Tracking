<?php
session_start();
if (!isset($_SESSION['enr_no']) || ($_SESSION['enr_no']!=true)) {
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
  </style>
</head>

<body>

  <div class="navbar">
    <div class="logout">
      <a href="http://localhost/project/logout.php">Logout</a>
    </div>
    <div class="dropdown">
      <button class="dropbtn"><a href="http://localhost/project/ficard.php">Icard</a>

        <i class="fa fa-caret-down"></i>
      </button>
    </div>


    <div class="dropdown">
      <button class="dropbtn"><a href="">Event</a>

        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="http://localhost/project/event.php">Add</a>
        <a href="http://localhost/project/event_delete.php">Delete</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn"><a href="http://localhost/project/fnamoetab.php">Namo-e-tab</a>

        <i class="fa fa-caret-down"></i>
      </button>

    </div>

    <div class="dropdown">
      <button class="dropbtn"><a href="http://localhost/project/fscholership.php">Schoarship</a>

        <i class="fa fa-caret-down"></i>
      </button>
    </div>

    <div class="dropdown">
      <button class="dropbtn"><a href=""> Time Table</a>

        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="http://localhost/project/time_table.php">Add</a>
        <a href="http://localhost/project/time_table_delete.php">Delete</a>
      </div>
      
    </div>
    <div class="dropdown">
      <h4 style="padding-right: 400px;">Welcome Faculty </h4>
    </div>

  </div>
  <?php
include("connection.php");?>
</body>

</html>

<?php
 mysqli_close($conn);
?>