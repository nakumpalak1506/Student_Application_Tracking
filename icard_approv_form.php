<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Icard</title>
    <link rel="stylesheet" href="icard_approv_form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="back-btn">
        <button type="button" onclick="history.back()">Back</button>
    </div>
    <div class="container">
        <img class="logo" src="logo.png">
        <div class="title">Icard Approved or Reject</div>
        <hr>
        <div class="content">
            <form method="POST" action="i_approve.php">
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Enrollment No</span>
                        <input type="text" name="enr_no" pattern="\d{12}" placeholder="Enter 12 digit" maxlength="12" required>
                    </div>

                    <center>
                        <div class="button">
                            <input type="submit" name="approve" value="APPROVE"> <br>
                        </div>
                        <br>
                        <div class="button">
                            <input type="submit" name="reject" value="REJECT">
                        </div>
                    </center>
            </form>
        </div>
    </div>
</body>

</html>