<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="modal" id="modal">
        <div class="modal_content" id="modal_content">
            <input type="button" value="X" id="cut">
            <h1 id="h1">Please Rate</h1>
            <?php 
                if(!isset($_SESSION['name']))
                {
            ?>
            <div class="notLoggedIn">
                <label>Before you go ahead please logIn / SignUp<label>
                <a href="../firstpage.php"><input type="button" id="login" value="LogIn"></a>
                <a href="../sign_up_page.php"><input type="button" id="signup" value="SignUp"></a>
            </div>
            <?php
                }
            ?>
            <form class="rate" method="POST" action="store_rating.php"  enctype="multipart/form-data" >
                <input type="text" name="device_name" placeholder="Device Name" required="" id="device">
                <input type="file" name="image" id="imgFile">
                <div id="imagepreview" class="imagepreview"></div>
                <div class="heart_rating" id="heart_rating">
                    <label style="margin-top:10px;margin-left:100px">Rate:</label>

                    <i id='thumbs0'  onclick='myFunction(this, 1)' class="fa fa-star"></i>
                    <i id='thumbs1'  onclick='myFunction(this, 2)' class="fa fa-star"></i>
                    <i id='thumbs2'  onclick='myFunction(this, 3)' class="fa fa-star"></i>
                    <i id='thumbs3'  onclick='myFunction(this, 4)' class="fa fa-star"></i>
                    <i id='thumbs4'  onclick='myFunction(this, 5)' class="fa fa-star"></i>
                    
                    <input type="text" id="rate_count" name="rate_count" readOnly = true value="">
                </div>
                <div class="DeviceFeature">
                    <ol>
                        <i class="fas fa-arrows-alt"></i><label> How the Design and Build Quality is ?</label><textarea type="text" placeholder=" Type here..." required></textarea>
                        <br>
                        <i class="fas fa-arrows-alt"></i><label> How much Storage provided ?</label><textarea type="text" placeholder=" Type here..." required></textarea>
                        <br>
                        <i class="fas fa-arrows-alt"></i><label> Camera Specifications:</label><textarea type="text" placeholder=" Type here..." required></textarea>
                        <br>
                        <i class="fas fa-arrows-alt"></i><label> What is the Price ?</label><input type="text" placeholder=" Type here..." required>
                    <ol>
                </div>
                <textarea type="text" placeholder=" Say Somthing more ...." required="" name="comment" id="comment"></textarea>
                <input type="submit" value="Submit" name="rate" id="rate">
            </form> 
        </div>  
    </div> 
</body>
</html>