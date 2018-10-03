<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DeviceRate | Reset Password</title>
</head>
<body>
    <form method="POST" action="new.php">
        <input type="text" name = "emailaddress" placeholder="Enter Email">
        <input type="button" name="sendmail" value="Send Reset link to your Email">
        <?php
        if(isset($_SESSION['HAU']))
        {
        echo $_SESSION['HAU'];
        }
        ?>
    </form>
</body>
</html>