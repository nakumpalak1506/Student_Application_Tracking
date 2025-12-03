<?php
session_start();
include("connection.php");

    if(isset ($_SESSION['enr_no'])){

        $n="DELETE FROM `icard` WHERE Enr_no='$_SESSION[enr_no]'";
        $f= mysqli_query($conn,$n);
        echo "<script> 
					alert('delete Successfully');
					window.open('index.php','_self');
				  </script>";
    }
    else
    {
        echo "<script> 
					alert('delete not Successfully');
					window.open('index.php','_self');
				  </script>";
    }
?>