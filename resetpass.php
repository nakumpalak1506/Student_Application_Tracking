<?php
require("connection.php");
session_start();
$new_password = $_POST['new_password'];
$cpassword = $_POST['cpassword'];
if(isset($_SESSION['enr_no'])){
if($new_password == $cpassword){
  $que = "UPDATE `reg` SET `Password`='$new_password' where Enr_no ='$_SESSION[enr_no]'";
  $result = mysqli_query($conn,$que);
  if($result){
    echo "<script> 
          alert('password update Successfully!!');
          window.open('index.php','_self');
        </script>";
  }
  else
  {
    echo "<script> 
    alert('password not update Successfully!!');
    window.open('index.php','_self');
  </script>";
  }
}
else{
  echo "<script> 
    alert('password dose not match!!');
    window.open('resetpass.php','_self');
  </script>";
}
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="forgot_pass.css">
  <title>Forget Password</title>
</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <div class="center">
    <img class="logo" src="logo.png">
    <h2>Forgot Password</h2>
    <form method="post">
      <div class="txt_field">
        <input type="passwrod" name="new_password">
        <span></span>
        <label>New Password</label>
      </div>
      <div class="txt_field">
        <input type="password" name="cpassword">
        <span></span>
        <label>Confirm Password</label>
      </div>
      <input type="submit" name="submit" value="submit">
    </form>
  </div>
</body>
</html>
