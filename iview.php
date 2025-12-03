<?php
include("connection.php");
session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="UTF-8">
   <title>I card</title>
   <link rel="stylesheet" href="iview.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
   <div class="back-btn">
      <button type="button" onclick="history.back()">Back</button>
   </div>

   <div class="container">
      <img class="logo" src="logo2.jpg">
      <div class="title">Student Application Tracking</div>
      <hr>
      <?php
      $sql = "SELECT * FROM `icard` WHERE `Enr_no` = " . $_SESSION['enr_no'];
      $que = mysqli_query($conn, $sql);
      if ($raw = mysqli_fetch_assoc($que)) {
         echo "<b>";
         echo "<table border = 30>";
         echo "<tr>";
      ?>
         <img style="text-align: center;" src="./image/<?php echo $raw['photo'] ?>">
         <br><br>
      <?php
         echo "<br><br>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>";
         echo "<b> Enrollment No:</b>";
         echo "</td>";
         echo "<td>";
         echo $raw['Enr_no'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
         echo "<b>Department :</b>";
         echo "</td>";

         echo "<td>";
         echo $raw['Department_id'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";

         echo "<td>";
         echo "<b>Name:</b>";
         echo "</td>";

         echo "<td>";
         echo $raw['Name'];
         echo "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>";
         echo "<b>Date of Birth:</b>";
         echo "</td>";

         echo "<td>";
         echo $raw['Date_of_birth'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
         echo "<b>Phone No:</b>";
         echo "</td>";

         echo "<td>";
         echo $raw['Phone_no'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
         echo "<b>Blood Group:</b>";
         echo "</td>";

         echo "<td>";
         echo $raw['Blood_group'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
         echo "<b>Address:</b>";
         echo "</td>";

         echo "<td>";
         echo $raw['Address'];
         echo "</td>";
         echo "</tr>";

         echo "<tr>";
         echo "<td>";
         echo "<b>Status:</b>";
         echo "</td>";

         echo "<td>";
         echo $raw['Status'];
         echo "</td>";
         echo "</tr>";
         echo "</table>";
         echo "</b>";
      }
      ?>
      <center>
         <form action="genrate_pdf.php" method="POST">
            <div class="button">
               <input type="submit" name="pdf" value=" Genrate Pdf">
            </div>
         </form>
      </center>
      <?php mysqli_close($conn); ?>
   </div>
</body>

</html>