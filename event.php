<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include("connection.php");
session_start();
if (isset($_POST['add'])) {
    $event_id = $_POST["event_id"];
    $event_date = $_POST["event_date"];
    $event_detail = $_POST["event_detail"];
    //$profile =$_POST["profile"];
    //$status = $_POST["status"];

    //for img save
    $filename = $_FILES["profile"]["name"];
    $tempname = $_FILES["profile"]["tmp_name"];       
    $folder = "./image/" . $filename;

    $que = "INSERT INTO `event`(`Event_id`, `Event date`, `Event_details`,`image`) 
    VALUES ('$event_id','$event_date','$event_detail','$filename')";

    $result = mysqli_query($conn, $que);

    if ($result) {
        if (move_uploaded_file($tempname, $folder)) {
        echo "<script> 
					alert('Event add Successfully!!');
					window.open('facultydashboard.php','_self');
				  </script>";
        }
    } 
    else
    {
        echo "<script> 
					alert('Event not add Successfully!!');
					window.open('facultydashboard.php','_self');
				  </script>";

    }
    mysqli_close($conn);
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Event</title>
    <link rel="stylesheet" href="event.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="back-btn">
      <button type="button" onclick="history.back()">Back</button>
    </div>  

    <div class="container">
        <img class="logo" src="logo2.jpg">
        <div class="title">Event From</div>
        <hr>
        <div class="content">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Event_id</span>
                        <input type="number" name="event_id" placeholder="Enter your  Event id" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Event Date</span>
                        <input type="date" name="event_date" placeholder="Enter your Event Date" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Event Detail</span>
                        <input type="text" name="event_detail" placeholder="Enter your event detai" required>
                    </div>
                    <div class="input-box">
            <span class="details">Choose Photo:</span>
            <input class="profile" type="file" name ="profile" required>
          </div>
                </div>
                <center>
                    <div class="button">
                        <input type="submit" name="add" value="ADD">
                </center>
        </div>
        </form>
    </div>
    </div>
</body>

</html>