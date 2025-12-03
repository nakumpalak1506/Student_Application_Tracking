<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include('connection.php');
session_start();
if(isset($_POST['application_no'])){

if (isset($_POST['approve'])) {
    mysqli_query($conn, "UPDATE `namo-e-tab` SET `status`='Approved' WHERE `Application no` = '$_POST[application_no]'");
    echo "<script> 
        alert('Approved');
        window.open('facultydashboard.php','_self');
      </script>";

  } else if (isset($_POST['reject'])) {
    mysqli_query($conn, "UPDATE `namo-e-tab` SET `status`='Rejected' WHERE `Application no` = '$_POST[application_no]'");
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

?>