<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style.css">
    <title>CompareAnything | Welcome </title>
</head>

<body>
<div class="none">
    <header class="header"> 
            <nav>
                <a href="firstpage.php"><img  src="images/comp.jpg" class="logo"></a> 
                <h1><a href="firstpage.php">Compare Anything</a></h1>
            <ul id="list">
                <li class="current"><a href="#">Home</a></li>
                <!-- <li><a href="#forms">Join us</a></li> -->
                <li><a href="compare.php">Compare</a></li>
                <li><a href="#about">About Us</a></li>
            </ul>
            <div style="clear:both"></div>
        </nav>
    </header>

    <div class="container">
        <h1>Comapre With Love</h1>
        <p>Here you can comapre the latest devices & there features and <br> give your rating as feedback which will be useful for your other friend user.</p>
        <h2>Enjoy Comparing And Rating.</h2>
    </div>

    <div class="form" id="forms">
        <form id="signin" class="sign_in" method="POST" action="phpfiles/login.php" >
            <h3>Sign-In</h3>
            <div class="inputArea">
                <input type="text"  name="Email" placeholder="Username">
            </div>
            <div class="inputArea">
                <input type="Password" name="password" placeholder="Password">
            </div>
            <div class="submit_btn">
                <input type="submit" class="button_input"  value="sign-in" name="submit-signin">
            </div>
            <a href="sign_up_page.php"><input type="button" class="tosignup" name="signup" value="Not a member ? Sign-Up"></a>
            <a href="" class="tosignin">Forgot password?</a>
        </form>
    </div>
</div>
<div class="about" id="about">
    <h3>About Us</h3>
    <p>I think that humans have a huge capacity to carry pain and sadness. <br>
        There are things that haunt us our entire lives; we are unable to let them go. 
        The good times seem almost effervescent and dreamlike in comparison with the times that didn't go so well.
    </p>
</div>
<footer class="footer">
    <h4>Connect with us on</h4>
    <a href="www.whatsapp.com" target="_blank" title="Whatsapp"><img src="images/what.jpg"></a>
    <a href="www.facebook.com" title="Facebook"><img src="images/face.jpg"></a>
    <a href="www.instagram.com" title="Instagram"><img src="images/insta.jpg"></a>
    <a href="www.google.com" title="Google"><img src="images/google.jpg"></a>
    
</footer>

<script type="text/javascript">


</script>
</body>
</html>