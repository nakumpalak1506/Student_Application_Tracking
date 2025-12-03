<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require("connection.php");
  if (isset($_POST['save'])) {
    $application_id = $_POST['application_id'];
    $accedmic_year = $_POST['accedmic_year'];
    $student_id = $_POST['student_id'];
    $sch_code = $_POST['sch_code'];


    //insert value in database
    $b = "INSERT INTO `scholarship`(`Application_id`, `Accedmic_year`, `Enr_no`, `Sch_code`) 
        VALUES ('$application_id','$accedmic_year','$student_id','$sch_code')";

    $result = mysqli_query($conn, $b);

    if ($result) {
      echo "<script> 
					alert('Apply Successfully!!');
					window.open('dashboard.php','_self');
				  </script>";
    } else {
      echo "<script> 
					alert('Apply not Successfully!!');
					window.open('scholership.php','_self');
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
  <title>Scholarship</title>
  <link rel="stylesheet" href="scholarship.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <center>
    <div class="container">
      <img class="logo" src="logo2.jpg">
      <div class="title">Scholarship From</div>
      <hr>
      <div class="content">
        <form method="POST">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Application Id</span>
              <input type="text" name="application_id" pattern="\d{2}" placeholder="Enter your Application id" required>
            </div>
            <div class="input-box">
              <span class="details">Accedmic Year</span>
              <input type="text" name="accedmic_year" pattern="\d{4}" placeholder="Enter your Accedmic year" required>
            </div>
            <div class="input-box">
              <span class="details">Student Id</span>
              <input type="text" name="student_id" pattern="\d{12}" placeholder="Enter your Student id" required>
            </div>
            <div class="input-box">
              <span class="details">Sch Code</span>
              <input type="text" name="sch_code" pattern="\d{4}" placeholder="Enter your Sch code" required>
            </div>
          </div>
          <center>
            <div class="button">
              <input type="submit" name="save" value="submit">
          </center>
      </div>
      </form>
  </center>
</body>

</html>