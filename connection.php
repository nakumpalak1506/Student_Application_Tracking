<?php

    $servar ="localhost";
    $username ="root";
    $pass ="";
    $database="project";

    $conn = mysqli_connect($servar,$username,$pass,$database);

    if(!$conn)
    {
        die("<h6>Not Connected</h6>" .mysqli_connect_error());
    }
?>
