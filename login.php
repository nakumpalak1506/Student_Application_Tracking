<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("connection.php");
  if (isset($_POST['enr_no']) && isset($_POST['password'])) {

    $enr_no = ($_POST['enr_no']);
    $password = ($_POST['password']);
    $_SESSION['enr_no'] = $enr_no;
    $sql = "SELECT * FROM `reg` WHERE Enr_no = '$enr_no' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    //$hashed_pass = $row["Password"];
    //$count = mysqli_num_rows($result);

    //if($count == 1){
    //if(password_verify($password,$hashed_pass)){

    if ($row["role"] == "Admin") {

      echo "<script> 
      alert('Login Successfully as Admin!!');
      window.open('admindashboard.php','_self');
      </script>";
    } elseif ($row["role"] == "Faculty") {

      echo "<script> 
      alert('Login Successfully as Faculty!!');
      window.open('facultydashboard.php','_self');
      </script>";
    } elseif ($row["role"] == "Student" && $row["status"] == "Approve") {
      echo "<script> 
      alert('Login Successfully as Student!!');
      window.open('dashboard.php','_self');
      </script>";
    } else {
      echo "<script> 
     alert('Please Wait for Approvel or incorrect Enrollment no and Password');
      window.open('login.php','_self');
      </script>";
    }
  } else {
    echo "<script> 
   alert('Please Enter Enrollment no and Password');
    window.open('login.php','_self');
    </script>";
  }
  mysqli_close($conn);
}

/*}
}*/
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <div class="center">
    <img class="logo" src="logo2.jpg">
    <h1>Login</h1>
    <form method="post">
      <div class="txt_field">
        <input type="text" name="enr_no">
        <span></span>
        <label>Enrollment No</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password">
        <span></span>
        <label>Password</label>
      </div>
      <center><input type="submit" name="login" value="Login"></center>
      <div class="signup_link">
        Do not have an account?<a href="http://localhost/project/reg.php">Register</a>
        <br><br>
        Forgot Password?<a href="http://localhost/project/forgot_pass.php">Click here</a>
      </div>
    </form>
  </div>
</body>

</html>