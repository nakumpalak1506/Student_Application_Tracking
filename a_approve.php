<?php
include('connection.php');
session_start();

//$_SESSION['Enr_no'] = $enr_no;

if (isset($_POST['approve'])) {
    mysqli_query($conn, "UPDATE `reg` SET `status`='Approve' WHERE Enr_no = '$_SESSION[enr_no]'");
    echo "<script> 
					alert('Approved');
					window.open('admindashboard.php','_self');
				  </script>";

  } else if (isset($_POST['reject'])) {
    mysqli_query($conn, "UPDATE `reg` SET `status`='Reject' WHERE Enr_no ='$_SESSION[enr_no]'");
    echo "<script> 
    alert('Rejected Data');
    window.open('admindashboard.php','_self');
    </script>";
  }
  else
  { 
    echo "<script> 
    alert('Data Not Found');
    window.open('admindashboard.php','_self');
    </script>";
  }
?>