<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include("connection.php");
if(isset($_POST['enr_no']) && isset($_POST['password'])){
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $enr_no = validate($_POST['enr_no']);
    $password = validate($_POST['password']);


    $sql= "SELECT * FROM `reg` WHERE Enr_no='$enr_no' AND Password ='$password'";
    $result =mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['enr_no'] = $enr_no;

    if($row["role"] =="Admin"){
        
      echo "<script> 
      alert('Login Successfully as Admin!!');
      window.open('admindashboard.php','_self');
      </script>";
    }
    elseif($row["role"] =="Faculty"){

      echo "<script> 
      alert('Login Successfully as Faculty!!');
      window.open('facultydashboard.php','_self');
      </script>";
    }
    elseif($row["role"] =="Student")
    {
      echo "<script> 
      alert('Login Successfully as Student!!');
      window.open('dashboard.php','_self');
      </script>";
    }
    else
    {
      echo "<script> 
      alert('incorrect Enrollment no and Password');
      window.open('login.php','_self');
      </script>";
    }
    
}
else
{
  echo "<script> 
  alert('incorrect Enrollment no and Password');
  window.open('login.php','_self');
  </script>";
}
mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <button type="button" onclick="history.back()">Back</button>

  <div class="center">
    <img class="logo" src="logo.png">
    <h1>Login</h1>
    <form  method="post">
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
      <input type="submit" name="login" value="Login">
      
    </form>
  </div>
</body>
</html>

