<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include("connection.php");
    if(isset($_POST['save']))
    {
        $semester_id = $_POST['semester_id'];
        $name = $_POST['name'];
        $student_id = $_POST['student_id'];
        $application_no = $_POST['application_no'];
        $mobile_no = $_POST['mobile_no'];
        //$status = $_POST['status'];
        //insert value in database
        $d="INSERT INTO `namo-e-tab`(`Semester_id`, `name`, `Enr_no`, `Application no`, `Mobile_no`) 
        VALUES ('$semester_id','$name','$student_id','$application_no','$mobile_no')";

        $result= mysqli_query($conn,$d);

        if($result)
        {
          echo "<script> 
					alert('Apply Successfully!!');
					window.open('dashboard.php','_self');
				  </script>";
        }
        }
        else
        {
          echo "<script> 
					alert('Apply not Successfully!!');
					window.open('namo.php','_self');
				  </script>";

        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Namo-e-tab</title>
  <link rel="stylesheet" href="namo.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <div class="container">
    <img class="logo" src="logo2.jpg">
    <div class="title">Namo-e-tab From</div>
    <hr>
    <div class="content">
      <form method="post">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Semester</span>
            <select name="semester_id" id="semester_id">
              <option value="#"></option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              </select>
          </div>   
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" name="name" placeholder="Enter your Name" required>
          </div>
          <div class="input-box">
            <span class="details">Student Id</span>
            <input type="text" name="student_id" placeholder="Enter your Student id" pattern="\d{12}" required>
          </div>
          <div class="input-box">
            <span class="details">Application no</span>
            <input type="text" name="application no" placeholder="Enter your Application no" pattern="\d{4}" required>
          </div>
          <div class="input-box">
            <span class="details">Mobile No</span>
            <input type="tel" name="mobile_no" placeholder="Enter your Mobile no" pattern="\d{10}" required>
          </div>

        </div>
        <center>
          <div class="button">
            <input type="submit" name="save" value="submit">
        </center>
    </div>
    </form>
  </div>
  </div>
</body>

</html>