<?php 
session_start();
unset($_SESSION['name']);
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
            <nav class="nav">
                <a href="firstpage.php"><img  src="images/comp.png" class="logo"></a> 
                <h1><a href="firstpage.php">Compare<span style="color:#3d0280;">Anything</span></a></h1>
            <ul id="list">
                <li class="current"><a href="">Home</a></li>
                <!-- <li><a href="#forms">Join us</a></li> -->
                <li><a href="#" onclick="popup()">Compare</a></li>
                <li><a href="#about">About Us</a></li>
            </ul>
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

<div class="information">
    <div class="info_head">
     <h1>Top Trending Brands With Greate Features...</h1>
    </div>
    <div class="box1">
    </div>
    <div class="card_data">
            <h2>Google Pixel 2 XL</h2>
            <h3>A camera so good it deserves unlimited smart storage.</h3>
            <p>Capture every detail and access all your photos from any device.</p>
    </div>

    <div class="box2">
    </div>
    <div class="card_data" id="card_data2">
       <!-- <h2>iPhone X Plus</h2> -->
       <h3>The screen is gorgeous.</h3>
       <p>The iPhone X marks the first time that Apple has used an OLED panel on a smartphone, and the difference over the old LCD displays is clear.</p>
    </div>

    <div class="box1 box3">
    </div>
    <div class="card_data" id="card_data3">
       <h3>SAMSUNG GALAXY NOTE 9 FEATURE</h3>
       <ul>
           <li>DISPLAYS- 6.4 inches dual curved display</li>
           <li>PROCESSOR- snapdragon 850 CPU</li>
           <li>RAM- 8GB/10GB DDR4</li>
           <li>CAMERAS- (12MP+12MP) rear/(8MP+8MP) front</li>
           <li>BATTERY- 3900mAh</li>
           <li>STORAGE- 128GB/256GB</li>
           <li>Sensor- In-display Fingerprint</li>
       </ul>   
       
    </div>

</div>

<div class="what_user_says">
        <input type="button" name="what_user_says" value="Check Out What User's Says ... " onclick="popup()">
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

<script src="jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="header.js"></script>

<script>

function popup() {
    alert("Please Sign Up.");
}
</script>
</body>
</html>