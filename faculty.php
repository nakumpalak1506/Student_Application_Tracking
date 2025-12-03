<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include('connection.php');
    if(isset($_POST['submit']))
    {
      $enr_no = $_POST['enr_no'];
      $name = $_POST['name'];
      $gender= $_POST['gender'];
      $password = $_POST['password'];
      //$hash = password_hash($password,PASSWORD_DEFAULT);
      $email= $_POST['email'];
      //$status = $_POST['status'];
      // $profile_picture = $_POST['profile_picture'];
  
      //for img save
      $filename = $_FILES["profile_picture"]["name"];
      $tempname = $_FILES["profile_picture"]["tmp_name"];       
      $folder = "./image/" . $filename;


        //insert value in database
        $a="INSERT INTO `reg`(`Enr_no`, `Name`, `Gender`, `Password`, `Email`, `role`, `status`, `profile_picture`) VALUES 
        ('$enr_no','$name','$gender','$password','$email','Faculty','Approve','$filename')";

        $result= mysqli_query($conn,$a);

        if($result)
        {
          if (move_uploaded_file($tempname, $folder)) {
          echo "<script> 
          alert('Apply Successfully!!');
          window.open('admindashboard.php','_self');
        </script>";
          }
        }
        else
        {
          echo "<script> 
          alert('Apply not Successfully!!');
          window.open('admindashboard.php','_self');
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
  <title>Add Faculty</title>
  <link rel="stylesheet" href="faculty.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
    
  </div>
  <div class="container">
    <img class="logo" src="logo2.jpg">
    <div class="title">Add Faculty</div>
    <hr>
    <div class="content">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Enrollment No</span>
            <input type="text" name="enr_no" pattern="\d{12}" placeholder="Enter 12 digit" maxlength="12" required>
          </div>
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
          </div>
          <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" value="Male">
            <input type="radio" name="gender" id="dot-2" value="Female">
            <input type="radio" name="gender" id="dot-3" value="other">
            <span class="gender-title">Gender</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">Other</span>
              </label>
            </div>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" pattern="\d{4}" placeholder="Enter Four characters"  required>
          </div>
          <div class="input-box">
            <span class="details">Email Id</span>
            <input type="email" name="email" placeholder="Enter Your gmail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Choose Photo</span>
            <input type="file" name="profile_picture" accept=".png, .jpg, .jpeg" required>
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