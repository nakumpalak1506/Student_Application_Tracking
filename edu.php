<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include('connection.php');
    if(isset($_POST['submit']))
    {
        $standard = $_POST['standard'];
        $seat_no = $_POST['seat_no'];
        $passing_year = $_POST['passing_year'];
        $percentage = $_POST['percentage'];
        $board = $_POST['board'];
        $enr_no = $_POST['enr_no'];

        //insert value in database
        $a="INSERT INTO `edu`(`standard`, `seat_no`, `passing_year`, `percentage`, `board`,`Enr_no`) 
        VALUES ('$standard','$seat_no','$passing_year','$percentage','$board','$enr_no')";

        $result= mysqli_query($conn,$a);

        if($result)
        {
          echo "<script> 
          alert('Education Detail Add Successfully!!');
          window.open('dashboard.php','_self');
        </script>";
        }
        else
        {
          echo "<script> 
          alert('Education Detail Not Add Successfully!!');
          window.open('dashboard.php','_self');
        </script>";

        }
        mysqli_close($conn);
      
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Education</title>
  <link rel="stylesheet" href="edu.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <div class="container">
    <img class="logo" src="logo2.jpg">
    <div class="title">Education Detail</div>
    <hr>
    <div class="content">
      <form method="post">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Select Qulification</span>
            <select name="standard" id="standard">
              <option value="#"></option>
              <option value="10th">10th</option>
              <option value="12th">12th</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Seat No</span>
            <input type="number" name="seat_no" pattern ="d/{5}" placeholder="Enter Seat No" required>
          </div>
          <div class="input-box">
            <span class="details">Passing Year</span>
            <input type="text" name="passing_year" placeholder="Enter year" required>
          </div>
          <div class="input-box">
            <span class="details">Percentage</span>
            <input type="text" name="percentage" placeholder="Enter 10th Percentage" required>
          </div>

          <div class="input-box">
            <span class="details">Enter Board/Univercity</span>
            <input type="text" name="board" placeholder="Enter Board Name" required>
          </div>
          <div class="input-box">
            <span class="details">Enrollment No</span>
            <input type="text" name="enr_no"  pattern="\d{12}" placeholder="Enter 12 digit" required>
          </div>
        </div>
        <center>
          <div class="button">
            <input type="submit" name="submit" value="submit">
        </center>
    </div>
    </form>
  </div>
  </div>
</body>

</html>