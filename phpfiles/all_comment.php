<?php
include 'connect.php';
//     unset($_SESSION['Reply']);
// if(isset($_POST["allcomment"])|| isset($_SESSION['Reply']))
// {  
    // unset($_SESSION['Reply']);
    $query = "SELECT DISTINCT device_name FROM ratings ORDER BY device_name";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../../jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="all_comment.css">
    <title>DeviceRating | All Comments</title>

</head>
<body>
<header class="header"> 
    <nav class="nav navcompare">
        <a href="firstpage.php"><img  src="images/comp.png" class="logo"></a> 
        <h1><a href="firstpage.php">Device<span style="color:#3d0280;">Rating</span></a></h1>
        <ul id="list">
            <li id="search_icon_on_header"><i class="fa fa-search"></i></li>
            <li title="Home"><a href="../firstpage.php">Home</a></li>
            <li title="Device list" class='dropDown' id="device_list"><a>Device list</a></li>
            <!-- <li><a href="sign_up_page.php">Join us</a></li> -->
            <li title="Rates & comments"><a href="compare.php">Rates & comments</a></li>
            <li title="All Comments" class="current"><a href="#">All Comments</a></li>
            <li title="About Us"><a href="#about">About Us</a></li>
        </ul>
    </nav>
</header>

<div class="main_head">
    <div class="setting_show">
      <i id="setting" class="fa fa-cog"></i>
    </div>
    <div class="settings">
        <div> 
            <a href='../firstpage.php'><input type='button' value='Home'></a> 
        </div>
        <div>
            <a><input type="button" title="Device list" class='dropDown' id="device_list" value="Device list"></a>
        </div> 
        <div>   
            <a href="compare.php"><input type="button"  title="Rates & comments" value="Rates & comments"></a>
        </div>
        <div>
            <a href="#about"><input type="button"  title="About Us" value="About Us"></a>
       </div>
       <div>
            <a href="#contact"><input type="button"  title="Contact us" value="Contact Us"></a>
       </div>
    </div>
</div>

<div class="main_content">    
    <div class="head" >
        <div class="searchbar searchbarforallcomment">
            <input type="text" class="search" placeholder="Search your device here..." id="search">
            <i class="fa fa-search" aria-hidden="true"></i> 
        </div>    
    </div>
    <div class="aside" id="aside">
            <div>
                <h4 id="p">All devices rated till now present here.</h4>

            <ul>
            <li id="show_device_list"><input type="button" value="Device list"></li>
             <?php
                if($count > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                ?>
                    
                    <li class="hidden" onclick= "myfunction(this.id)" id="<?php echo $row['device_name'] ?>"><input type="submit" id="<?php echo $row['device_name'] ?>" value="<?php echo $row['device_name'] ?>" name="<?php echo $row['device_name'] ?>"  ></li>
                  
                <?php
                    }   
                }
                ?>
            </ul>
            </div>
            
    </div>  
</div> 
<div class="about" id="about">
    <h3>About Us</h3>
    <p> I think that humans have a huge capacity to carry pain and sadness. <br>
        There are things that haunt us our entire lives; we are unable to let them go. 
        The good times seem almost effervescent and dreamlike in comparison with the times that didn't go so well.
    </p>
</div>
<footer class="footer">
    <h4>Connect with us on</h4>
    <div class="contact">
        <!-- <a href="https://api.whatsapp.com/send" data-action="share/whatsapp/share" target="_blank" title="Whatsapp"><img src="images/what.jpg"></a>
        <a href="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0" title="Facebook"><img src="images/face.jpg"></a>
        <a href="www.instagram.com" title="Instagram"><img src="images/insta.jpg"></a>
        <a href="www.google.com" title="Google"><img src="images/google.jpg"></a>  -->
        <ul>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://plus.google.com/discover"><i class="fab fa-google-plus"></i></a></li>
        </ul>
    
    </div>
</footer>
    

<script>
    $(function() {
        $(window).on("scroll", function() {
            if($(window).scrollTop() > 75) {
                $('#search_icon_on_header').show();
            } else {
                $('#search_icon_on_header').hide();
            }
        });
    });

 $(document).ready(function(){
    // $('.hidden').hide();
    $('#search_icon_on_header').hide();
    $('#show_device_list').hide();
    $('.main_head').hide();
    $('#device_list,#search_icon_on_header').click(function(){
        $('.hidden').show();  
        $('#p').show();
    //   $(window).scrollTop(0);
        $('html, body').animate({scrollTop:0}, 'slow');

    });
    $('.hidden').click(function(){
        $('.hidden').hide();
        $('#p').hide();
    });

    $('#show_device_list').click(function(){
        $('.hidden').toggle();
    });

    $(window).resize(function(){
        $('#show_device_list').hide();
        $('.main_head').hide();
        if($(window).width() < 1036)
        {
            $('.main_head').show();
            $('.hidden').hide();
            $('#show_device_list').show();
        }
    });
    if($(window).width() < 1036)
    {
        $('.main_head').show();
        $('.hidden').hide();
        $('#show_device_list').show();
    }
   

 });


 function myfunction(id)
 {
    $("#comments_print").remove();
    device_name = id;
   
    // alert(device_name);
    $.ajax({
        url: "show_comment.php",
        type: "POST",
        data: {device_name:device_name},
        success: function(data){
            Data = data;
            // alert(Data);
            $("#aside").after("<div id='comments_print'>"+Data+"</div>");
        }
    });
 }

 // search devices
 var items = document.getElementById("aside").querySelectorAll("li");
 
        var search = document.getElementById('search');
        search.addEventListener('keyup',filter);
        function filter(e){

            var text = e.target.value.toLowerCase();
           
            items.forEach(function(item){
                var itemname = item.innerHTML;
                  
                if(itemname.toLowerCase().indexOf(text)!= -1 )
                {
                    item.style.display = "block";
                }
                else{
                    item.style.display = "none";
                    if(document.getElementById("comments_print")!=null)
                    {
                        document.getElementById("comments_print").style.display ="none";
                    }
                    
                }
            });
        } 
        
    var i = 0;
    arr = [];
    function myFunction(x, temp){
    if(arr.includes(temp)){
        i = 0;
        arr.splice(arr.indexOf(temp),1);
    }
    else{
        i = 1;
        arr[temp-1] =  temp;
        console.log(arr);
    }
    if(i%2 != 0){
    x.style.color = "blue";  
    x.style.fontSize = "26px";                                              
    }
    else{
        x.style.color = "black";
        x.style.fontSize = "25px";
    }
    }
///////////////////////////////////////////////////////////////////////////////
//////////////////////////setting right corner icon ////////////////////////////

$(document).ready(function(){
        $(".settings").hide();
        $(".setting_show").click(function(){
            $(".settings").toggle();
            
            $("#setting").toggleClass( "rotation");
         
            return false;
        });
    });

    $(document).click(function() {
        $(".settings").hide();
        });
///////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

</script>
</body>
</html>