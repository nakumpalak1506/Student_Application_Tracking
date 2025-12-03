<?php

if(isset ($_SESSION['Enr_no'])){
include("connection.php");
session_start();
    $n="DELETE FROM `namo-e-tab` WHERE Enr_no = '$_SESSION[enr_no]'";
    $f= mysqli_query($conn,$n);
    echo "<script> 
					alert('delete Successfully!!');
					window.open('dashboard.php','_self');
				  </script>";
    }
else
{
    echo "<script> 
    alert('delete Successfully!!');
    window.open('dashboard.php','_self');
  </script>";

}


?>