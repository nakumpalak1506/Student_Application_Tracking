<?php
session_start();
require("connection.php");

if(isset ($_SESSION['enr_no'])){

    $n="DELETE FROM `scholarship` WHERE Enr_no= '$_SESSION[application_id]'";
    $f= mysqli_query($conn,$n);
    echo "<script> 
		alert('Delete Successfully');
		window.open('index.php','_self');
		</script>";
}
else
    {
        echo "<script> 
		    alert('Delete not Successfully');
			window.open('index.php','_self');
		    </script>";
    }
?>