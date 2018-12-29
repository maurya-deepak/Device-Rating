<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../../jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Device Rating | Change Password</title>
    <style>
        body{
            margin:0;
            padding:0;
            font-family:sans-serif;
        }
        .container{
            position:absolute;
            width:400px;
            min-height:400px;
            /* background-color:black; */
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            text-align:center;
            border:1px solid silver;
            border-radius:4px;
            box-shadow:2px 2px 20px rgba(105, 105, 105,0.1),-2px 0px 20px rgba(105, 105, 105,0.2);
            }
        .container input{
            width:70%;
            height:35px;
            margin:20px 10px;
            font-size:20px;
            border:1px solid silver;
            
        } 
        .container input[type="submit"]
        {
            background-color:#3d0280;
            border:none;
            color:#ffffff;
            border-radius:2px;
            letter-spacing:2px;
            cursor:pointer;
        }   
        #back{
            position:absolute;
            top:14px;
            left:5px;
            padding:10px 10px;
            width:60px;
            border-radius:2px;
            /* border  :1px solid silver; */
            color:black;
        }
        #back:hover{
            box-shadow:2px 2px 10px rgba(0,0,0,0.2);
        }
        @media screen and (max-width:1036px) {  
            .container{
                width:350px;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <a href="compare.php" id="back" title="back"><i class="fas fa-chevron-left"></i></a>
        <h2>Change Password</h2>
        <form action="password.php" method="POST">
            <input type="password" id="oldpassword" name="oldpassword" placeholder="Old Password" required=""> 
            <br>
            <input type="password" id="password" name="password" placeholder="Choose New Password" required="">
            <br>
            <input type="password" id="re-password" name="re-password" placeholder="Re-Enter New Password" required="">
            <br>
            <?php
            if(isset($_SESSION['cpass']))
            {
                echo "<p style='color:red;' id='warning'>".$_SESSION['cpass']."</p>";
            }
            ?>
            <input type="submit" id="submit" value="Submit" name="submit">
            <p>Please log-in again after changing password.</p>
        </form>
    </div>
<script type='text/javascript'>
    $(window).bind('onload',function(){
        <?php
            unset($_SESSION['cpass']);
        ?>
    });
</script>
</body>
</html>