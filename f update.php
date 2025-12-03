<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
include("connection.php");  
if(isset($_POST['update']))
{
        $semester_id  = $_POST['semester_id '];
        $name = $_POST['name'];
        $enr_no = $_POST['enr_no'];
        $transaction_id= $_POST['transaction_id'];
        $transaction_date=$_POST['transaction_date'];

        $u="UPDATE `fees` 
        SET `Semester_id`='$semester_id',`name`='$name',`Enr_no`='$enr_no',`Transaction_id`='$transaction_id',`Transaction_date`='$transaction_date' WHERE Enr_no ='$_SESSION[enr_no]'";

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
          window.open('f update.php','_self');
          </script>";

        }
    mysqli_close($conn);
}
}
?>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Update Record</title>
  <link rel="stylesheet" href="f update.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <div class="container">
    <img class="logo" src="logo.png">
    <div class="title">Update Form</div>
    <hr>
   
    <div class="content">
      <form method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Semester_id</span>
            <input type="text" name="semester_id" pattern="\d{1}" placeholder="Enter your  Semester id" required>
          </div>
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" name="name" placeholder="Enter your Name" required>
          </div>
          <div class="input-box">
            <span class="details">Enrollment no</span>
            <input type="texte=" name="enr_no" pattern="\d{12}" placeholder="Enter 12 digit" required>
          </div>
          <div class="input-box">
            <span class="details">Transaction_id</span>
            <input type="text" name="transaction_id" pattern="\d{6}" placeholder="Enter your Transaction id" required>
          </div>
          <div class="input-box">
            <span class="details">Transaction_date</span>
            <input type="date" name="transaction_date" required>
          </div>

        </div>
        <center>
          <div class="button">
            <input type="submit" name="submit" value="submit">
        </center>
    </div>
    </form>
  </div>
</body>
</html>