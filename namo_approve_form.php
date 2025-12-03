<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Namo-e-Tab</title>
    <link rel="stylesheet" href="namo_approve_form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="back-btn">
        <button type="button" onclick="history.back()">Back</button>
    </div>
    <div class="container">
        <img class="logo" src="logo.png">
        <div class="title">Approved or Reject</div>
        <hr>
        <div class="content">
            <form method="POST" action="namo_approve.php">
                <div class="user-details">

                    <div class="input-box">
                    <span class="details">Application No</span>
                    <input type="text" name="application_no" placeholder="Enter Application No" required>
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