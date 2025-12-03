<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include('connection.php');
  if (isset($_POST['submit'])) {
    $enr_no = $_POST['enr_no'];
    $D_id = $_POST['D_id'];
    $name = $_POST['name'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone_no = $_POST['phone_no'];
    $blood_group = $_POST['blood_group'];
    $address = $_POST['address'];

    //for img save
    $filename = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "./image/" . $filename;


    //insert value in database
    $a = "INSERT INTO `icard`(`Enr_no`, `Department_id`, `Name`, `Date_of_birth`, `Phone_no`, `Blood_group`, `Address`, `photo`) 
        VALUES ('$enr_no','$D_id','$name','$date_of_birth','$phone_no','$blood_group','$address','$filename')";

    $result = mysqli_query($conn, $a);

    if ($result) {
      if (move_uploaded_file($tempname, $folder)) {
        echo "<script> 
          alert('Apply Successfully!!');
          window.open('dashboard.php','_self');
        </script>";
      }
    } else {
      echo "<script> 
          alert('Apply not Successfully!!');
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
  <title>Icard Form</title>
  <link rel="stylesheet" href="icard.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <div class="container">
    <img class="logo" src="logo2.jpg">
    <div class="title">I Card Form</div>
    <hr>
    <div class="content">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Enrollment No</span>
            <input type="text" name="enr_no" pattern="\d{12}" placeholder="Enter 12 digit" required>
          </div>
          <div class="input-box">
            <span class="details">Department Id</span>
            <select name="D_id" id="D_id">
              <option value="#"></option>
              <option value="07">07</option>
              <option value="06">06</option>
              <option value="04">04</option>
              <option value="05">05</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Student Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" name="date_of_birth" required>
          </div>

          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="tel" name="phone_no" pattern="\d{10}" placeholder="Enter 10 digit" required>
          </div>

          <div class="input-box">
            <span class="details">Blood Group</span>
            <input type="text" name="blood_group" placeholder="Enter your blood group" required>
          </div>

          <div class="input-box">
            <span class="details">Address</span>
            <textarea name="address" rows="4" cols="30" placeholder="Enter Your Address" required></textarea>
          </div>

          <div class="input-box">
            <span class="details">Choose Photo</span>
            <input type="file" name="photo" value="photo" required>
          </div>
        </div>
        <br>
        <center>
          <div class="button">
            <input type="submit" name="submit" value="submit">
          </div>
        </center>
    </div>
  </div>
  </form>
</body>

</html>