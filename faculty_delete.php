<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include("connection.php");
session_start();
if (isset($_POST['remove'])) {
   
    $Enr_no = $_POST["enr_no"];

    $que = "DELETE FROM `reg` WHERE Enr_no = $Enr_no";

    $result = mysqli_query($conn, $que);

    if ($result) {
        echo "<script> 
		alert('Remove Faculty Successfully!!');
		window.open('admindashboard.php','_self');
		</script>";
    } else {
        echo "<script> 
        alert('Remove Faculty Not Successfully!!');
        window.open('admindashboard.php','_self');
      </script>";
    }
    mysqli_close($conn);
}
}

?>