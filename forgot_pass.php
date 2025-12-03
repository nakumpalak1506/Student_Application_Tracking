
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="forgot_pass.css">
  <title>Forget Password</title>
</head>

<body>
  <div class="back-btn">
    <button type="button" onclick="history.back()">Back</button>
  </div>
  <div class="center">
    <img class="logo" src="logo.png">
    <h2>Forgot Password</h2>
    <form method="post" action="forgot_pass_process.php">
      <div class="txt_field">
        <input type="enr_no" name="enr_no">
        <span></span>
        <label>Enrollment No</label>
      </div>
      <input type="submit" name="submit" value="submit">
    </form>
  </div>
</body>
</html>