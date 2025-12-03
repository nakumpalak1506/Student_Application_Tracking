<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include('connection.php');
session_start();
if(isset($_POST['id'])){
   
    //$id = $_POST['id'];

if (isset($_POST['approve'])) {
    mysqli_query($conn, "UPDATE `event` SET `status`='Approved' WHERE `Event_id` = '$_POST[id]'");
    echo "<script> 
        alert('Approved');
        window.open('admindashboard.php','_self');
      </script>";

  } else if (isset($_POST['reject'])) {
    mysqli_query($conn, "UPDATE `event` SET `status`='Rejected' WHERE `Event_id` = '$_POST[id]'");
    echo "<script> 
        alert('Rejected');
        window.open('admindashboard.php','_self');
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