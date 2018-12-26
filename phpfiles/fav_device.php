<?php
include 'connect.php';

?>
<style>
    .main-list{
        padding:100px;
    }
    .main-list .heading{
        text-align:center;
    }
    .listOfDevices{
        display:flex;
        z-index:1;
    }
    .listOfDevices ul{
        list-style:none;
        display:flex;
        padding:10px 20px;
        flex-wrap:wrap;
    } 
    .listOfDevices ul li{
        text-align:center;
        width:100px;
        padding:10px 20px;
        margin:4px 2px; 
        border:1px solid silver;
        cursor:pointer;
    } 
    .listOfDevices ul li:hover{
        background-color:silver;
        color:#3d0280;
    }
    .listOfDevices ul li input{
        background:transparent;
        border:none;
        font-size:20px;
        cursor:pointer;
    }
    .flex_data{
        display:flex;
        align-items:center;
        justify-content: center;
        margin:0 100px;
    }
    .image img{
        width:300px;
        height:600px;
    }

    .all_comments_block{
        margin-left:100px;
    }
    #comment_block{
        margin-top:20px;
        border-bottom:5px dotted silver;
    }
    #comment_block h3,p{
    display:inline;
    }
    #comment_block i{
        margin-top:10px;
        padding:5px 5px;
        font-size:20px;
        color:red;
    }
    #comment_block p{
        font-size:20px;
    }

</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="../../jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="..\style.css">
    <title>DeviceRating | Rate & Comment </title>
</head>
<body>
<header class="header" style="background-color:#fff;"> 
    <nav class="nav navcompare">
        <a href="firstpage.php"><img  src="images/comp.png" class="logo"></a> 
        <h1><a href="firstpage.php">Device<span style="color:#3d0280;">Rating</span></a></h1>
        <ul id="list">
            <li><a href="../firstpage.php">Home</a></li>
            <li id='Rate_comm'><a href="compare.php">Rates & comments</a></li>
            <li id="li_about"><a href="#about">About Us</a></li>
        </ul>
    </nav>
</header>
<div class="main-list">
    <div class="heading">
        <h3>Your favorite devices.</h3>
    </div>
    <div class="listOfDevices">
        <ul>
            <?php

            $user = $_SESSION['name'];
            $query = "SELECT DISTINCT device_name FROM fav_devices WHERE username = '$user' group by id desc";
            $result = mysqli_query($conn,$query); 
            if(!mysqli_num_rows($result))
            {
                echo "<p>No favorite devices found.Please add devices to favorite list from <a href='compare.php'>campare page.</a></p>";
            }  
            else{   
            while($row = mysqli_fetch_assoc($result))
            {

                ?>
                <li onclick= "myfunction(this.id)" id="<?php echo $row['device_name'] ?>"><input type="submit" value="<?php echo $row['device_name'] ?>" name="<?php echo $row['device_name'] ?>"  ></li>
            <?php
            }
        }
            
            ?>
        </ul>


    </div>

</div>
<!-- about section -->
<div class="about" id="about">
            <h3>About Us</h3>
            <p>I think that humans have a huge capacity to carry pain and sadness. <br>
            There are things that haunt us our entire lives; we are unable to let them go.
           The good times seem almost effervescent and dreamlike in comparison with the times that didn't go so well.
            </p>
</div>
<!-- footer section -->
<footer class="footer" id="contact">
    <h4>Connect with us on</h4>
    <div class="contact">
        <ul>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://plus.google.com/discover"><i class="fab fa-google-plus"></i></a></li>
        </ul>
    </div>
</footer>

<script>

    function myfunction(id)
    {
        $(".device_details").remove();
        device_name = id;
        $.ajax({
            url: "show_comment.php",
            type: "POST",
            data: {fav_device_name:device_name},
            success: function(data){
                Data = data;
                $(".listOfDevices").after("<div class='device_details'>"+Data+"</div>");
            }
        });
    }

</script>
</body>
</html>

