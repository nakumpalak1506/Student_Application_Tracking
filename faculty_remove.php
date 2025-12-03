<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Remove Faculty</title>
    <link rel="stylesheet" href="faculty_remove.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="back-btn">
      <button type="button" onclick="history.back()">Back</button>
    </div>
    <div class="container">
        <img class="logo" src="logo2.jpg">
        <div class="title">Remove Faculty</div>
        <hr>
        <div class="content">
            <form method="post" action="faculty_delete">
            <div class="user-details">
          <div class="input-box">
            <span class="details">Enrollment No</span>
            <input type="text" name="enr_no" pattern="\d{12}" placeholder="Enter 12 digit" maxlength="12" required>
          </div>
                </div>
                <center>
                    <div class="button">
                        <input type="submit" name="romove" value="REMOVE">
                </center>
        </div>
        </form>
    </div>
    </div>
</body>

</html>