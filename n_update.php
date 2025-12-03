<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("connection.php");
  if (isset($_POST['update'])) {
    $semester_id  = $_POST['semester_id '];
    $name = $_POST['name'];
    $enr_no = $_POST['enr_no'];
    $application_no = $_POST['application_no'];
    $mobile_no = $_POST['mobile_no'];

    $u = "UPDATE `namo-e-tab` 
        SET `Semester_id`='$semester_id',`name`='$name',`Enr_no`='$enr_no',`Application no`='$application_no',`Mobile_no`='$mobile_no' 
        WHERE Enr_no = '$_SESSION[enr_no]'";

    $result = mysqli_query($conn, $u);

    if ($result) {
      echo "<script> 
					alert('Update Successfully!!');
					window.open('dashboard.php','_self');
				  </script>";
    } else {
      echo "<script> 
					alert('Update not Successfully!!');
					window.open('n update.php','_self');
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
  <link rel="stylesheet" href="n_update.css">
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
            <span class="details">Semester</span>
            <input type="text" name="semester_id" pattern="\d{2}" placeholder="Enter your Semester id" pattern="\d{2}" required>
          </div>
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Enrollment No</span>
            <input type="text" name="enr_no" placeholder="Enter your Student id" pattern="\d{12}" required>
          </div>
          <div class="input-box">
            <span class="details">Application no</span>
            <input type="text" name="application_no" placeholder="Enter your Application no" pattern="\d{4}" required>
          </div>
          <div class="input-box">
            <span class="details">Mobile No</span>
            <input type="tel" name="mobile_no" placeholder="Enter your Mobile_no" pattern="\d{10}" required>
          </div>
        </div>
        <center>
          <div class="button">
            <input type="submit" name="update" value="Update">
        </center>
    </div>
    </form>
  </div>
  </div>
</body>

</html>