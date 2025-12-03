<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("connection.php");
  if (isset($_POST['update'])) {
    $application_id = $_POST['application_id'];
    $accedmic_year = $_POST['accedmic year'];
    $satudent_id = $_POST['satudent_id'];
    $sch_code = $_POST['sch_code'];

    session_start();
    $_SESSION['application_id'] = $application_id;

    $u = "UPDATE `scholarship` SET 
        `Application_id`='$application_id',`Accedmic_year`='$accedmic year',`Student_id`='$student_id',`Sch_code`='$sch_code'
        WHERE Application_id= '$_SESSION[application_id]'";

    $result = mysqli_query($conn, $u);

    if ($result) {
      echo "<script> 
					alert('Update Successfully!!');
					window.open('dashboard.php','_self');
				  </script>";
    } else {
      echo "<script> 
					alert('Update not Successfully!!');
					window.open('s update.php','_self');
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
  <title>Update Record</title>
  <link rel="stylesheet" href="supdate.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <div class="container">
    <img class="logo" src="logo2.jpg">
    <div class="title">Update Record</div>
    <hr>
    <div class="content">
      <form method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Application Id</span>
            <input type="text" name="application_id" placeholder="Enter your Application id" required>
          </div>
          <div class="input-box">
            <span class="details">Accedmic Year</span>
            <input type="text" name="accedmic year" placeholder="Enter your Accedmic year" required>
          </div>
          <div class="input-box">
            <span class="details">Student Id</span>
            <input type="text" name="id" placeholder="Enter your Student id" required>
          </div>
          <div class="input-box">
            <span class="details">Sch Code</span>
            <input type="text" name="sch_code" placeholder="Enter your Sch code" required>
          </div>
        </div>
        <center>
          <div class="button">
            <input type="submit" name="update" value="Update">
        </center>
    </div>
    </form>
</body>

</html>