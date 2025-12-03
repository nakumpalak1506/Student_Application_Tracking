<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("connection.php");
  session_start();

  if (isset($_POST['remove'])) {

    $event_id = $_POST["event_id"];
    $n = "DELETE FROM `event` WHERE Event_id= '$event_id'";
    $f = mysqli_query($conn, $n);
    if ($f) {
      echo "<script> 
      alert('event delete Successfully!!');
      window.open('facultydashboard.php','_self');
      </script>";
    } else {
      echo "<script> 
					alert('event not delete Successfully!!');
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
  <title>Remove Event</title>
  <link rel="stylesheet" href="event_delete.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>

  <div class="container">
    <img class="logo" src="logo2.jpg">
    <div class="title">Remove Event</div>
    <hr>
    <div class="content">
      <form method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Event_id</span>
            <input type="number" name="event_id" placeholder="Enter your  Event id" required>
          </div>
        </div>
        <center>
          <div class="btn">
          <input type="submit" name="remove" value="REMOVE">
          </div>
        </center>
    </div>
  </div>
  </form>
  </div>
  </div>
</body>

</html>