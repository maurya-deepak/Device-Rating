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
    <script src="../jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function(){
        $("#sign-in").click(function()
        {
            $("#email_error").remove();
            $("#pass_error").remove();
            var email = $("#Email").val() ;
            var pass  = $("#password").val() ;
            if(email == "")
            {
                $("#Email").after("<p id='email_error'>Username is required.</p>");  
            }
            else{
                if(pass == "")
                {
                    $("#password").after("<p id='pass_error'>Password is required.</p>");
                }
                else{
                    $.ajax({
                        type: "POST",
                        url: "phpfiles/login.php",
                        data: 'username=' +email + '&password=' +pass,
                        success: function(data) {
                            if(data == "failed")
                            {
                               
                                $("#sign-in").after("<p id='pass_error'>Username or Password is incorrect.</p>");
                            }
                            else{
                                if(data == "Success")
                                {
                                 window.location.href = "phpfiles/compare.php"; 
                              
                                }
                            }
                       },
                    });
                }
            }
        });
   
});
    </script>
    <title>CompareAnything | Welcome </title>
</head>

<body>
<div class="none" id="none">

    <header class="header"> 
            <nav class="nav">
                <a href="firstpage.php"><img  src="images/comp.png" class="logo"></a> 
                <h1><a href="firstpage.php">Device<span style="color:#3d0280;">Rating</span></a></h1>
            <ul id="list">
                <li class="current"><a href="">Home</a></li>
                <!-- <li><a href="#forms">Join us</a></li> -->
                <li><a href="#" onclick="popup()">Rate</a></li>
                <li><a href="#about">About Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="container" id="container">
        
        <h1>Rate The Devices With Love</h1>
        <p>Here you can compare the latest devices & there features and <br> give your rating as feedback which will be useful for your other friend user.</p>
        <h2>Enjoy Comparing And Rating.</h2>
    </div>

    <div class="form" id="forms">
        <form id="signin" class="sign_in">
            <h3>Sign-In</h3>
            <div class="inputArea">
                <input type="text"  name="Email" placeholder="Username" id="Email">
            </div>
           
            <div class="inputArea">
                <input type="Password" name="password" placeholder="Password" id="password">
            </div>
           
            <div class="submit_btn">
                <input type="button" class="button_input"  value="sign-in" name="submit-signin" id="sign-in">
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
        <div class="card_data">
                <h2>Google Pixel 2 XL</h2>
                <h3>A camera so good it deserves unlimited smart storage.</h3>
                <p>Capture every detail and access all your photos from any device.</p>
        </div>
    </div>
   

    <div class="box2">
        <div class="card_data">
        <!-- <h2>iPhone X Plus</h2> -->
        <h3>The screen is gorgeous.</h3>
        <p>The iPhone X marks the first time that Apple has used an OLED panel on a smartphone, and the difference over the old LCD displays is clear.</p>
        </div>
    </div>


    <div class="box1 box3">
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

<!-- <script type="text/javascript" src="header.js"></script> -->

<script>
window.onload = changeImage;
function popup() {
    alert("Please Sign Up.");
}

var i=0;
var images = [];
var time = 5000 ;

images[0] = "images/m3.jpg";
images[1] = "images/m2.jpg";
images[2] = "images/body.jpg";
images[3] = "images/googlepixel.jpg.png";
images[4] = "images/sam.jpg";

function changeImage() {
    document.getElementById("none").style.backgroundImage = "linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url('"+images[i]+"')";
    document.getElementById("none").style.transition = ".5s ease-in infinite"
    if(i < images.length -1)
    {
        i++;
    }
    else{
        i=0;
    }
    setTimeout(" changeImage()",time);
}




</script>
</body>
</html>