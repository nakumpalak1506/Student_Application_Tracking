<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Report</title>
    <style>
       body
       {
              font-family: Arial, Helvetica, sans-serif;
              background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(pl.jpg);
              background-repeat: no-repeat;
              background-position:center;
	            background-size:cover;
              background-position:center;
	            height: 150vh;
              padding: 20px ;
              color: #fff;
      }
      table
     {
       height: 50%;
       width:50%;
       text-align: center;
       padding-top:10px;

      }

      h3{
       text-align: center;
       padding-top: 100px;
      }

    </style>
</head>
<body>
<div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
    <h3>Fees Report</h3>
    <br><br><br>
     
<center>

  <?php
  $s="SELECT * FROM `fees` WHERE  Enr_no='$_SESSION[enr_no]'"; 
  $q= mysqli_query($conn,$s);
  if($raw = mysqli_fetch_assoc($q)) 
{
         echo "<b>";
         echo "<table border = 30>";
   
    echo "<tr>";

              echo "<td>";
                     echo "<b> semester_id </b>";
               echo "</td>";

                echo "<td>";
                     echo $raw['Semester_id'];
                echo "</td>";
    echo "</tr>";

    echo "<tr>";
                   echo "<td>";
                      echo "<b>name</b>";
                   echo "</td>";

                   echo "<td>";
                       echo $raw ['name'];
                   echo "</td>";
    echo "</tr>";

    echo "<tr>";
                   echo "<td>";
                        echo "<b>Entrollment No</b>";
                   echo "</td>";

                   echo "<td>";
                         echo $raw['Enr_no'];
                   echo "</td>";
    echo "</tr>";
          
    echo "<tr>";
                   echo "<td>";
                         echo "<b>transaction_id</b>";
                   echo "</td>";

                   echo "<td>";
                           echo $raw['Transaction_id'];
                   echo "</td>";
    echo "</tr>";

    echo "<tr>";
                 echo "<td>";
                         echo "<b>transaction_date</b>";
                 echo "</td>";

                 echo "<td>";
                         echo $raw['Transaction_date'];
                 echo "</td>";
echo "</tr>";
    
    echo "</table>";
    echo "</b>";
}

else
{
  echo "error";
}
mysqli_close($conn);
?>
</center>
</body>
</html>
