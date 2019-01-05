<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Forgot Password</title>
    <style>
        .message{
            position:absolute;
            top:14%;
            left:50%;
            transform:translate(-50%,-50%);
        }
        .container-pass{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            width:350px;
            border:1px solid silver;
            text-align:center;
            padding:20px 10px;
            border-radius:4px;
            box-shadow:2px 1px 10px rgba(0,0,0,0.4),-2px -1px 10px rgba(0,0,0,0.4);
        }
        .container-pass p{
            font-size:20px;
        }

        .container-pass input{
            width:300px;
            padding:10px 10px;
            margin:15px 10px;
            border:1px solid silver;
        }
        .container-pass input[type='submit']{
           background:silver;
           width:200px;
           border:1px solid silver;
           font-family:sans-serif;
           border-radius:4px;
           box-shadow:2px 2px 10px rgba(0,0,0,0.2);
           cursor:pointer;
           font-size:20px;
        }
        .about{
            margin-top:600px;
        }
    </style>
</head>
<body>
    <header class="header"style="background-color:#fff;"> 
        <nav class="nav">
        <div>
            <h1><a href="../firstpage.php"><img  src="images/comp.png" class="logo">Device<span style="color:#3d0280;">Rating</span></a></h1>
        </div>
        <div>
            <ul id="list">
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="#about">About Us</a></li>
            </ul>
        </div>
        </nav>
    </header>
    <div class="message">
    <?php
    if(isset($_SESSION['mail_sent'])){
        
        echo $_SESSION['mail_sent'];
    } 
    ?>
    </div>
    <div class="container-pass">
        <p>You must enter the email address which you been provided for this site. The email will be send to provided email address from there you can reset your password.</p>
        <form method="POST" action="mail.php">
            <!-- <input type="text" placeholder="your username" name="username" required=""> -->
            <input type="text" placeholder="your email" name="email" required="">
            <input type="submit" value="send mail" name='submit'>
        </form>
    </div>
   
<div class="about" id="about">
    <h3>About Us</h3>
    <h5>Online Compare and Rate</h5>
    <p>DeviceRating is the one stop destination to compare and rate gadgets, electronics online ranging from mobiles.</p><br>
    <h5>Why comparison and Rating require?</h5>
    <p>Mobile Phones nowadays have become the soul of your technical being, life without them is just not possible.From the latest and new models from Samsung, Lenovo, Apple to exclusive deals and offers like Xolo you have it all here. So planning to buy a new mobile visit our DeviceRating page and compare and rate the devices.
    </p>
</div>

<footer class="footer">
    <h4>Connect with us on</h4>
    <div class="contact" id="contact">
        <ul>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://plus.google.com/discover"><i class="fab fa-google-plus"></i></a></li>
        </ul>
    </div>
    <div>
        <p>&copy;:DeviceRating 2018</p>
    </div>
</footer>
<script type="text/javascript">
    // $(window).bind('onload',function(){
    //     <?php
    //         unset($_SESSION['mail_sent']);
    //     ?>
    // });

</script>
</body>
</html>