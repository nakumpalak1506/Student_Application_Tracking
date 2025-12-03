<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include('connection.php');
session_start();
if(isset($_POST['enr_no'])){
   
    //$id = $_POST['id'];

if (isset($_POST['approve'])) {
    mysqli_query($conn, "UPDATE `icard` SET `Status`='Approved' WHERE `Enr_no` = '$_POST[enr_no]'");
    echo "<script> 
        alert('Approved');
        window.open('facultydashboard.php','_self');
      </script>";

  } else if (isset($_POST['reject'])) {
    mysqli_query($conn, "UPDATE `icard` SET `Status`='Rejected' WHERE `Enr_no` = '$_POST[enr_no]'");
    echo "<script> 
        alert('Rejected');
        window.open('facultydashboard.php','_self');
      </script>";
  }
  else{
    echo "<script> 
        alert('Id not found');
        window.open('admindashboard.php','_self');
      </script>";
 
  }
}
}
?>