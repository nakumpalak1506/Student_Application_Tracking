<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
include("connection.php");  
if(isset($_POST['update']))
{
        $enr_no = $_POST['enr_no'];
        $d_id = $_POST['d_id'];
        $name = $_POST['name'];
        $date_of_birth = $_POST['date_of_birth'];
        $phone_no = $_POST['phone_no'];
        $blood_group = $_POST['blood_group'];
        $address = $_POST['address'];

        $u="UPDATE `icard` SET 
        `Enr_no`='$enr_no',`Department_id`='$d_id',`Name`='$name',`Date_of_birth`='$date_of_birth',`Phone_no`='$phone_no',`Blood_group`='$blood_group',`Address`='$address'
        WHERE Enr_no= '$_SESSION[enr_no]'";

        $result= mysqli_query($conn,$u);

        if($result)
        {
          echo "<script> 
          alert('Udate Successfully!!');
          window.open('dashboard.php','_self');
          </script>";
        }
        else
        {
          echo "<script> 
          alert('Update not Successfully!!');
          window.open('i update.php','_self');
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
  <link rel="stylesheet" href="i_update.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
  <div class="back-btn">
  <button type="button" onclick="history.back()">Back</button>
  </div>
  <div class="container">
    <div class="error">
    </div>
    <img class="logo" src="logo2.jpg">
    <div class="title">Update Record</div>
    <hr>
    <div class="content">
      <form method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Enrollment No</span>
            <input type="text" name="enr_no" pattern="\d{12}" placeholder="Enter 12 digit">
          </div>
          <div class="input-box">
            <span class="details">Department ID</span>
            <input type="text" name="d_id" pattern="\d{2}"  placeholder="Enter Department Name">
          </div>
          <div class="input-box">
            <span class="details">Student Name</span>
            <input type="text" name="name" placeholder="Enter your name">
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" name="date_of_birth">
          </div>

          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="tel" name="phone_no" pattern="\d{10}"placeholder="Enter 10 digit">
          </div>

          <div class="input-box">
            <span class="details">Blood Group</span>
            <input type="text" name="blood_group" placeholder="Enter your blood group">
          </div>

          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" placeholder="Enter your address" maxlength="100">
          </div>
        </div>
        <center>
          <div class="button">
            <input type="submit" name="update" value="Update">
        </center>
    </div>
    </form>
  </div>
</body>

</html>