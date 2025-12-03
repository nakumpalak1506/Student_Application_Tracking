<?php
include('connection.php');
session_start();

//$_SESSION['Enr_no'] = $enr_no;

if (isset($_POST['approve'])) {
    mysqli_query($conn, "UPDATE `fees` SET `Status`='Approved' WHERE Student_id = '$_SESSION[enr_no]'");
    echo "<script> 
        alert('Appreved');
        window.open('facultydashboard.php','_self');
      </script>";

  } else if (isset($_POST['reject'])) {
    mysqli_query($conn, "UPDATE `fees` SET `Status`='Rejected' WHERE Student_id= '$_SESSION[enr_no]'");
    echo "<script> 
        alert('Rejected');
        window.open('facultydashboard.php','_self');
      </script>";
  }

?>