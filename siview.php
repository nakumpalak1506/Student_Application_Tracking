<?php
session_start();
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <title>scholarship Report</title>
       <style>
              body {
                     font-family: Arial, Helvetica, sans-serif;
                     background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(pl.jpg);
                     background-repeat: no-repeat;
                     background-position: center;
                     background-size: cover;
                     background-position: center;
                     height: 150vh;
                     padding: 20px;
                     color: #fff;
              }

              table {
                     height: 50%;
                     width: 60%;
                     margin: 0 auto;
                     background-color: rgba(255, 255, 255, 0.05);
                     border-collapse: collapse;
                     border-radius: 12px;
                     box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
                     text-align: center;
                     padding-top: 10px;
              }

              th,
              td {
                     padding: 16px 24px;
                     text-align: left;
              }

              th {
                     background-color: rgba(255, 255, 255, 0.1);
                     font-weight: bold;
                     color: #f0f0f0;
              }

              tr:nth-child(even) {
                     background-color: rgba(255, 255, 255, 0.03);
              }

              h3 {
                     text-align: center;
                     padding-top: 100px;
              }

              button {
                     margin-top: 30px;
                     height: 8%;
                     width: 8%;
                     border-radius: 8px;
                     border: none;
                     color: #fff;
                     font-size: 16px;
                     cursor: pointer;
                     background-color: darkblue;
                     padding: 15px 24px;
                     text-decoration: none;
              }

              button:hover {
                     background: gray;
              }
       </style>
</head>

<body>
       <div class="button">
              <button type="button" onclick="history.back()">Back</button>
       </div>

       <h3>Scholership Detail</h3>
       <center>
              <?php

              $ap = "SELECT * FROM `scholarship` WHERE Enr_no= '$_SESSION[enr_no]'";
              $qe = mysqli_query($conn, $ap);
              if ($raw = mysqli_fetch_assoc($qe)) {
                     echo "<b>";
                     echo "<table border =30>";

                     echo "<tr>";

                     echo "<td>";
                     echo "<b> Application No </b>";
                     echo "</td>";

                     echo "<td>";
                     echo $raw['Application_id'];
                     echo "</td>";
                     echo "</tr>";

                     echo "<tr>";
                     echo "<td>";
                     echo "<b>Application Year</b>";
                     echo "</td>";

                     echo "<td>";
                     echo $raw['Accedmic_year'];
                     echo "</td>";
                     echo "</tr>";

                     echo "<tr>";
                     echo "<td>";
                     echo "<b>Student id</b>";
                     echo "</td>";

                     echo "<td>";
                     echo $raw['Enr_no'];
                     echo "</td>";
                     echo "</tr>";

                     echo "<tr>";
                     echo "<td>";
                     echo "<b>Sch code</b>";
                     echo "</td>";

                     echo "<td>";
                     echo $raw['Sch_code'];
                     echo "</td>";
                     echo "</tr>";

                     echo "<tr>";
                     echo "<td>";
                     echo "<b>Status</b>";
                     echo "</td>";

                     echo "<td>";
                     echo $raw['status'];
                     echo "</td>";
                     echo "</tr>";

                     echo "</table>";
                     echo "</b>";
              } else {
                     echo "error";
              }
              ?>
       </center>

</body>

</html>