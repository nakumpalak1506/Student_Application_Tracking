<?php
include("connection.php");
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer-master/src/Exception.php';
require 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer/PHPMailer-master/src/SMTP.php';
session_start();
if (isset($_POST['submit'])) {
  // Get the enrollment number from the form
  $enr_no = $_POST['enr_no'];
  // insert a qurey in database
  $query = "SELECT * FROM `reg` WHERE Enr_no = '$enr_no'";
  $result = (mysqli_query($conn, $query));

  // If the user is found, reset their password and send an email with the new password
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $new_password = generate_password();
    //$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $email = $row['Email'];
    $query = "UPDATE `reg` SET Password = '$new_password' WHERE Enr_no = '$enr_no'";
    mysqli_query($conn, $query);
  }  

$mail = new PHPMailer(true);
try {
//Enable SMTP debugging.
$mail->SMTPDebug = 2;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
$mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
);
//Provide username and password     
$mail->Username = "chauhanarjun2255@gmail.com";
$mail->Password = "dbhjouyiudjxlwqw";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;
$mail->From = "chauhanarjun2255@gmail.com";
$mail->FromName = "Student Infromation Corner";
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = "Email from student information corner";
$mail->Body = "Your Password : ".$new_password;
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "<script> 
  alert('Message hash been send in your eamil id check your mail id');
  window.open('index.php','_self');
  </script>";
}
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: ". $mail->ErrorInfo;
}}

// generate randome password
function generate_password($length = 4)
{
  $chars = '0123456789';
  $chars_length = strlen($chars);
  $password ='';
  for ($i = 0; $i < $length; $i++) {
    $password .= $chars[rand(0, $chars_length - 1)];
  }
  return $password;
}

mysqli_close($conn);
?>