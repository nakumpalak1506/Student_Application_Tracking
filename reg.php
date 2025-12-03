<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include('connection.php');

  if (isset($_POST['submit'])) {
    $enr_no = $_POST['enr_no'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    //for img save
    $filename = $_FILES["profile_picture"]["name"];
    $tempname = $_FILES["profile_picture"]["tmp_name"];
    $folder = "./image/" . $filename;

    //insert value in database
    $sql = "INSERT INTO `reg` (`Enr_no`, `Name`, `Gender`, `Password`, `Email`,`profile_picture`) 
    VALUES ('$enr_no','$name','$gender','$password','$email','$filename')";
    $result = (mysqli_query($conn, $sql));

    if ($result) {
      if (move_uploaded_file($tempname, $folder)) {

        echo "<script> 
					alert('Registration Successfully!!');
					window.open('index.php','_self');
				  </script>";
        //$_SESSION['error']="Apply successfully!!";
      }
    } else {
      echo "<script> 
        alert('Registration not Successfully!!');
        window.open('index.php','_self');
      </script>";
      //$_SESSION['error'] = "Apply not successfully!!";
    }
    mysqli_close($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="reg.css">
</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <div class="container">

    <img class="logo" src="logo2.jpg">
    <div class="title">Registration</div>
    <!--<div class="dropdown">
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="http://localhost/project/a_login.php">Admin</a>
      <br>
      <br>
      <a href="http://localhost/project/f_login.php">Faulty</a>
    </div>
  </div>-->
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
            <input type="password" name="password" pattern="\d{4}" placeholder="Enter Four characters" required>
          </div>
          <div class="input-box">
            <span class="details">Email Id</span>
            <input type="email" name="email" placeholder="Enter Your gmail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Choose Photo</span>
            <input type="file" name="profile_picture" value="photo" required>
          </div>
          <center>
            <br><br>
            <div class="button">
              <input type="submit" name="submit" value="Register">
            </div>

            <div class="login">
              Alredy Register?<a href="http://localhost/project/login.php">Login</a>
            </div>
          </center>
      </form>
    </div>
  </div>
</body>

</html>