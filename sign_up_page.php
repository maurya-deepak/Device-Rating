<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>CompareAnything | Sign-Up</title>

</head>
<body class="bo">
    <div class="sign_up_page">
     <form id="signup" class="sign-up" method="POST" action="phpfiles/connect.php"> 
        <h3 class="h3">Sign-Up To Enjoy The Services</h3>
        <div class="inputArea">
            <input type="text" name="Name"  placeholder="  Name">
        </div>
        <div class="inputArea">
                <input type="text" name="user_email" placeholder="  Email">
        </div>
        <div class="inputArea">
                <input type="text" name="username"  placeholder="  Choose Username">
        </div>
        <div class="inputArea">
            <input type="Password" name="password"  placeholder="  Password" >   
        </div>
        <div class="submit_btn">
                <input type="submit" id="submit" class="button_input" value="sign-up" name="submit-signup">
        </div>
        <div class="back_btn">
            <a href="firstpage.php"><input type="button" name="back" value="back" ></a>
        </div>
    </form> 
</div>   
  
</body>
</html>