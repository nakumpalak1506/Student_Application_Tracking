<?php

session_start();
session_unset();
session_destroy();
echo "<script> 
		alert('Logout Successfully!!');
		window.open('index.php','_self');
	</script>";
//header("location:index.php");
?>