<?php
       include 'connect.php';
       unset($_SESSION['not_logged_in']);
       unset($_SESSION['cpass']);
       if(isset($_GET['name']))
       {
            $username = $_SESSION['name'];
            $deviceName = $_GET['name'];
        
            $insertQuery = "INSERT INTO fav_devices(device_name,username) VALUES('$deviceName','$username') ";
        
            $result = mysqli_query($conn,$insertQuery);
            if($result === true)
            {
                header("Location: compare.php");
            }
            else{
                echo "Something went wrong";
            }
        }
?>
<!DOCTYPE html>
<style>
.main_head{
    padding-top:80px;
}
.header{
    background-color:#fff;
    box-shadow: 0px 4px 3px -3px rgba(0,0,0,0.45);
    position:fixed;
    top:0;
}
.header .navcompare ul li a{
    color:black;
}
.header .navcompare ul li:hover a{
    color:#000;
}
.header .navcompare h1{
    text-shadow: 1px 1px #000;
}
.header .navcompare h1 a{
    color:black;
}

#list .current a{
   color:#000;
}
#list li{
    border-radius:4px;
}

.welcome{
    margin:0;
    padding:0;  
    display:inline;
    color:#3d0280;
}

.commented{
    margin:0;
    padding:0;
    font-size:20px;
    color:#3d0280; 
}
.head{
    margin:0;
    padding:0;
    min-height:50px;
    font-family: sans-serif; 
}
#allcomment{
    border-top-left-radius:4px;
    border-top-right-radius:4px;
    border:none;
    
}
#logout{
    border-bottom-left-radius:4px;
    border-bottom-right-radius:4px;
    border:none;
}
.commented
{
position:absolute;
top:0;
left:30%;
}

#fav-heart{
    font-size:22px;
    position:absolute;
    top:5px;
    left:5px;
    color:red;
    cursor:pointer;
    opacity: 0.0;
    transition: all 500ms ease-in-out;
}

.fav_device button{
    width:10px;
    height:10px;
}
.heart_rating i{
 margin-left:10px;
 font-size:25px;
 cursor:pointer;
 color:silver;
}
#rate_count{
border:none;
display:inline;                                                                                                                                                 
}
.show_rate{
    margin-top:30px;
}
.show_rate i{
    font-size:28px;
    color:rgb(4, 11, 107);
    margin:3px 3px;
}
.setting_show{
    padding-top:100px;
}
.setting_show i{
    position:fixed;
    top:15px;
    right:10px;
    color:black;
    font-size:24px;
    cursor:pointer;
    transition: transform 300ms linear;
    z-index:3;
}
.settings{
    width:200px;
    position:fixed;
    top:40px;
    right:20px;
    z-index:33;
    border-radius:4px;
    background-color:#fff;
    /* box-shadow: 1px 11px 17px -4px rgba(111,128,113,1); */
    box-shadow: 0px -4px 18px -5px rgba(0,0,0,0.75);
}
.rotation{
  transform: rotate(90deg);
}
.settings input{
    margin:1px 0px;
    width:100%;
    height:40px;
    font-size:20px;
    background-color:#fff;
    border:none;
    cursor:pointer;
}
.settings input:hover{
    background-color:rgba(167, 158, 158,0.3);
    color:#3d0280; 

}
.notLoggedIn{
    margin-top:5px;
    text-align:center;
}
.notLoggedIn label{
    font-size:20px;
    display:block;
}
.notLoggedIn input{
    width:100px;
    height:30px;
    border:1px solid silver;
    font-size:18px;
    background-color:red;
    color:#ffffff;
    cursor:pointer;
    border-radius:4px;
}
.notLoggedIn input:hover{
    background-color:#fff;
    color:red;
}
.DeviceFeature{
    margin-top:20px;
    margin-left:10%;
    margin-right:10%;
    padding:20px 10px;
    border:1px solid silver;
}
.DeviceFeature i{
font-size:12px;
}

.DeviceFeature textarea{
    width:531px;
    height:67px;
    border:1px solid silver;
    border-radius:4px;
    resize: none;
    padding-left:5px;
    font-size: 18px;
}
.avgReview a ,.No-of-reviews a{
    text-decoration:none;
}
.avgReview a:hover , .No-of-reviews a:hover{
    color:orange;
    text-decoration:underline;
}
.next_previous{
    position:relative;
    margin:20px 10px;
    padding:10px 10px;
    text-align:center;
}

.next_previous button{
    width:200px;
    margin:10px 30px;
    padding:10px 10px;
    font-size:18px;
    cursor:pointer;
    border:1px solid silver;
    border-radius:4px;

}
.next_previous button:hover{
    border:1px solid black;
    background:whitesmoke;
}
.next_previous i{
    font-size:16px;
}
#Rate_comm{
    margin-right:20px;
}

/* a.disabled {
   pointer-events: none;
   cursor: default;
} */

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
<header class="header"> 
    <nav class="nav">
        <div>
            <h1><a href="../firstpage.php"><img  src="images/comp.png" class="logo">Device<span style="color:#3d0280;">Rating</span></a></h1>
        </div>
        <div class="searchbar" id="full_width_searchbar">
            <input type="text" class="search" placeholder="search your devices" id="search">
            <i class = 'fa fa-search'></i>       
        </div>
        <div style="margin-right:25px">
            <ul id="list">
                <li><a href="../firstpage.php">Home</a></li>
                <li  class="current"><a href="compare.php">Rates & comments</a></li>
            </ul>
        </div>
    </nav>
</header>

<!-- rating and comment section popup starts here --> 
     <div class="modal" id="modal">
            <div class="modal_content" id="modal_content">
           
                    <input type="button" value="X" id="cut">
                    <h1 id="h1">Please Rate</h1>
                    <?php 
                        if(!isset($_SESSION['name']))
                        {
                    ?>
                    <div class="notLoggedIn">
                        <label>Before you go ahead please log in / Sign up<label>
                        <a href="../firstpage.php"><input type="button" id="login" value="Log in"></a>
                        <a href="../sign_up_page.php"><input type="button" id="signup" value="Sign up"></a>
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
                        <!-- <div class="DeviceFeature">
                            <ol>
                                <i class="fas fa-arrows-alt"></i><label> How the Design and Build Quality is ?</label><textarea type="text" placeholder="Type here..." required></textarea>
                              <br>
                                <i class="fas fa-arrows-alt"></i><label> How much Storage provided ?</label><textarea type="text" placeholder="Type here..." required></textarea>
                                <br>
                                <i class="fas fa-arrows-alt"></i><label> Camera Specifications:</label><textarea type="text" placeholder="Type here..." required></textarea>
                                <br>
                                <i class="fas fa-arrows-alt"></i><label> What about Price ?</label><input type="text" placeholder="Type here..." required>
                            <ol>
                        </div> -->
                        <textarea type="text" placeholder="Comment here..." required="" name="comment" id="comment"></textarea>
                        <input type="submit" value="Submit" name="rate" id="rate">
                    </form>
               
                   
            </div>
           
    </div>  
   
<!-- rating and comment section popup end here -->

<!-- head part stats -->
<div class="main_head">
    <div class="setting_show">
      <i id="setting" class="fa fa-cog"></i>
    </div>
    <div class="settings">
        <div class="all_comment">
            <form method="POST" action="all_comment.php">
                <input type="submit" value="Show all comments" name="allcomment" id="allcomment">
            </form>
        </div>
        
        <div>
            <?php
                    if(isset($_SESSION['name']))
                    {
                    ?>
                        <div>
                            <a href="changePassword.php"><input type="button" id="changePassword" value="Change Password"></a>
                        </div>

                        <div>
                            <a href="fav_device.php"><input type="button" id="favdevice" value="favorite Devices"></a>
                        </div>
                <?php 
                    } 
                ?>
                        <div>
                            <a href="#about"><input type="button" value="About Us"></a>
                        </div>
                        <div>
                            <a href="#contact"><input type="button" value="Contact Us"></a>
                        </div>
                <?php 
                    if(isset($_SESSION['name']))
                    {
                ?>
                        <div class="log_out">
                            <form method="POST" action="logout.php">
                                <input type="submit" value="Log Out" name="logout" id="logout">
                            </form>
                        </div>
                <?php
                    }
                ?>
        </div>
        
    </div>
</div>   
<!-- head part end -->  
<?php 
 
        if(isset($_SESSION['name']))
        {
            // prints username who has logined
            echo "<h4 class='welcome' title='logged in as ".$_SESSION['name']."'>Welcome ".$_SESSION['name']."</h4>";
        }
        
?>
<?php
        if(isset($_SESSION['comment']))
        {
            // prints on which device user commented
            // echo "<script>alert('Thank you for your rating and comment on ".$_SESSION['comment']."')</script>";
            unset($_SESSION['comment']);
            // session_destroy();
        }

?>

<!-- main comatainer conatains devices -->

    <div class="container-compare">
           <div class="all_data" id="all_data">
            
           <?php
            $a = 0;
            $limit = 8; 
            if (isset($_GET["page"]) && $_GET["page"] > 1) 
            {
                $page  = $_GET["page"]; 
            } 
            else 
            {
                $page=1; 
            } 

            $record_index= ($page-1) * $limit;  
         
            // $record_index =0;
            $sqql = "SELECT device_name , images FROM ratings  GROUP BY device_name  ORDER BY id DESC LIMIT $record_index,$limit";
           
            $result = mysqli_query($conn,$sqql);

            while($row = mysqli_fetch_assoc($result))
            {
                $image ="../images/".$row['images'];
            ?>
            <div class="data" id="box" style="background-image:url('<?php echo $image ;?>'),url('../images/not-available.png');">
                        <?php 
                            if(isset($_SESSION['name'])){ 
                                $name = "".$row['device_name']."";
                                // $name ="hi";
                                echo '<form action="fav_device.php" method="GET">';
                                echo '<a href="compare.php?name='.$name.'"><i class="fa fa-heart" id="fav-heart" title="Add to favourites"></i></a>';
                                echo '</form>';
                       
                            }
                        ?> 
                        <div class="btn" >
                            <label class="label"><?php echo $row['device_name'];?></label>
                        </div>
                        
                            <div class="show_rate">
                                <?php
                                                                         
                                    $star5query = mysqli_query($conn,"SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' AND rate_count = 5 ");
                                    $star5arr =  mysqli_fetch_array($star5query);
                                    $GLOBALS['star_five'] = $star5arr[0];

                                    $star4query = mysqli_query($conn,"SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' AND rate_count = 4 ");
                                    $star4arr =  mysqli_fetch_array($star4query);
                                    $GLOBALS['star_four'] = $star4arr[0];

                                    $star3query = mysqli_query($conn,"SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' AND rate_count = 3 ");
                                    $star3arr =  mysqli_fetch_array($star3query);
                                    $GLOBALS['star_three'] = $star3arr[0];

                                    $star2query = mysqli_query($conn,"SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' AND rate_count = 2 ");
                                    $star2arr =  mysqli_fetch_array($star2query);
                                    $GLOBALS['star_two'] = $star2arr[0];

                                    $star1query = mysqli_query($conn,"SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' AND rate_count = 1 ");
                                    $star1arr =  mysqli_fetch_array($star1query);
                                    $GLOBALS['star_one'] = $star1arr[0];
                         
                                    $query = "SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' ";
                                    $sum = "SELECT SUM(rate_count) FROM ratings  WHERE device_name = '{$row['device_name']}' ";
                                    $sum_rows = mysqli_query($conn,$sum);
                                    $count_rows = mysqli_query($conn,$query);
                                    $ro = mysqli_fetch_array($count_rows) ;
                                    // echo $ro[0];
                                    
                                    $rso = mysqli_fetch_array($sum_rows);
                                    
                                    // echo $rso[0];
                                    $total = $rso[0]/ $ro[0];
                                    // echo gettype($ro);
                                    for($i=0;$i<$total;$i++)
                                    {
                                    
                                 ?>
                                         <i class="fa fa-star"></i>
                                    <?php
                                     }
                                    ?>
                            </div>
                        
                        <div class="more_about_device" id="more_about_device">
                            <label> How the Design and Build Quality is ?</label><br>
                            <label> How much Storage provided ?</label><br>
                            <label> Camera Specifications:</label><br>
                            <label> What is the Price ?</label><br>
                            <div class="row">
                                <div class="No-of-reviews" style="margin-top:5px;">
                                    <a href="all_comment.php" title="see comments"><?php echo $ro[0]?> person's review</a>
                                </div>
                                <div class="side">
                                    <div>5 star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <?php  $per5 =  ($GLOBALS['star_five'] * 100) / $rso[0] .'%'; ?>
                                        <div class="bar-5" style='width:<?php echo $per5; ?> '></div>
                                    </div>
                                </div>
                                <div class="side right"><!-- count of 5 stars how many have given-->
                                    <div>
                                        <?php echo $GLOBALS['star_five'];?>
                                    </div>
                                </div>
                                <div class="side">
                                    <div>4 star</div> 
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <?php  $per4 =  ($GLOBALS['star_four'] * 100) / $rso[0] .'%'; ?>
                                        <div class="bar-4" style='width:<?php echo $per4; ?> '></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div> <?php echo $GLOBALS['star_four'];?></div>
                                </div>
                                <div class="side">
                                    <div>3 star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <?php $per3 =  ($GLOBALS['star_three'] * 100) / $rso[0] .'%' ; ?>
                                        <div class="bar-3" style='width:<?php echo $per3; ?> '></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div> <?php echo $GLOBALS['star_three']; ?></div>
                                </div>
                                <div class="side">
                                    <div>2 star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <?php $per2 =  ($GLOBALS['star_two'] * 100) / $rso[0] .'%' ;?>
                                        <div class="bar-2" style='width:<?php echo $per2; ?> '></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div> <?php echo $GLOBALS['star_two'] ; ?></div>
                                </div>
                                <div class="side">
                                    <div>1 star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <?php $per1 =  ($GLOBALS['star_one'] * 100) / $rso[0] .'%';?>
                                        <div class="bar-1" style='width:<?php echo $per1; ?> '></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div> <?php echo $GLOBALS['star_one'];?></div>
                                </div>
                            </div>
                            <div class = "avgReview" style="margin-top:5px;">
                                <a href="#"><?php echo round($total,1); ?> out of 5 stars.</a>
                            </div>
                        </div>

                        <div class="comment_btn">
                            <input type="button" value="Write review" class="done" title="Rate this device" id ="<?php echo $row['device_name'];?>">
                        </div>
           </div>
          
           <?php
            }
        
           ?>
           <div class="next_previous"> 
           <?php  
                $s = "SELECT COUNT(distinct device_name) FROM ratings"; 
                $retval1 = mysqli_query($conn, $s);  
                $row = mysqli_fetch_row($retval1);  
                $total_records = $row[0];  
                
                $total_pages = ceil($total_records / $limit);  
               
        
                if($page > 1){
                    echo '<a href="compare.php?page='.($page - 1).'"><button name="previous" title="Previous"><i class="fas fa-chevron-left"></i> Previous</button></a>';
                }
                if($page < $total_pages){
                    echo '<a href="compare.php?page='.($page + 1).'"><button name="next" title="Next">Next <i class="fas fa-chevron-right"></i></button></a>';

                }
            
            ?>
           
           </div>
           <div class="add_device">
                <a id="add" href="">Not find your device? add device here.</a>
           </div>
        </div>
</div>
<!-- about section -->
<div class="about" id="about">
    <h3>About Us</h3>
    <h5>Online Compare and Rate</h5>
    <p>DeviceRating is the one stop destination to compare and rate gadgets, electronics online ranging from mobiles.</p><br>
    <h5>Why comparison and Rating require?</h5>
    <p> Mobile Phones nowadays have become the soul of your technical being, life without them is just not possible.From the latest and new models from Samsung, Lenovo, Apple to exclusive deals and offers like Xolo you have it all here. So planning to buy a new mobile visit our DeviceRating page and compare and rate the devices.
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
    <div>
        <p>&copy:DeviceRating 2018</p>
    </div>
</footer>
<script type="text/javascript" src="rate.js"></script>
<script type="text/javascript">
       var name;
       var device_name;
       var modal = document.getElementById('modal');
       modal.style.visibility = 'hidden';
       document.getElementById('modal_content').style.visibility = "hidden";
       
///////////////////////// for creating new Devices(Data)///////////////////////////////////////

        document.getElementById("add").onclick  =  create_items;
        function create_items(e)
        {
            e.preventDefault();
           name =  prompt("Enter Name of device");
           if(name == 'null' || name == ""){
            alert("Name is INVALID.Please provide valid name.");
           }
           else{
           var label = document.createElement("label");

           var alldata = document.getElementById("all_data");

            var div1 = document.createElement("div");
            div1.setAttribute("class","data");

            var div2 = document.createElement("div");
            div2.setAttribute("class","btn");

            var input1 = document.createElement("input");
            input1.type = "button" ;
            input1.value = "Rate & Comment";

            all_data.appendChild(div1);

            div1.appendChild(div2);
        
            div2.appendChild(label);
            label.setAttribute("class","label");
            label.innerHTML = name;

            div2.appendChild(input1);

            input1.onclick = open_modal;
        }
    }

    // disable scrolling
/////////////////////////////////////////////////////////////////////////////
        var fixed = document.getElementById('modal');

        fixed.addEventListener('touchmove', function(e)
        {
           e.preventDefault();
        }, false);
/////////////////////////////////////////////////////////////////////////
//////////// rate and comment modal //////////////////////////////////
       var data = document.getElementById("all_data").querySelectorAll('[type=button]');
       var no_of_child = document.querySelectorAll('.data').length;

       for(i=0;i<no_of_child;i++)
       {
           data[i].onclick = open_modal;    
       }

       document.getElementById('add').onclick = open_modal;
 
       function open_modal(e)
       {    
            e.preventDefault();
            device_name = this.id;
            if(device_name !== "add")
            {
                var device_name_on_modal = document.getElementById("device");
                device_name_on_modal.value = device_name;
                device_name_on_modal.readOnly = true;
                
                device_name_on_modal.style.border="none";
                device_name_on_modal.style.fontSize="24px";
                $("#imgFile").hide();
            }
            
            var modal1 = document.getElementById('modal');
            modal1.style.visibility = "visible";
            document.getElementById('modal_content').style.visibility = "visible";
            modal1.style.animation = "popup 350ms ease-in-out forwards";
            document.getElementById('modal_content').style.animation = "popup 350ms ease-in-out forwards";
       }

       document.getElementById('cut').onclick = close_modal ;
       // clearing the color of the rate hearts/star
       var arra = document.getElementById("heart_rating").querySelectorAll('i');


       function close_modal(e)
       {    e.preventDefault();
            document.getElementById("device").readOnly = false;
            document.getElementById("device").style.border="1px solid silver";
            document.getElementById("device").style.fontSize="16px";
            var data = document.getElementById('modal');
            data.style.visibility = "hidden";
            document.getElementById('modal_content').style.visibility = "hidden";
            data.style.animation = "popin 350ms ease-in-out 1 forwards";
            document.getElementById('modal_content').style.animation = "popin 350ms ease-in-out 1 forwards";
            document.getElementById('device').value="";
            document.getElementById('comment').value="";
            $("#rate_count").val(null);
            $("#imgFile").show();
            $("#preimg").remove();
            $("#imgFile").val(null);
            for(var i=0;i<arr.length;i++)
            {
                arra[i].style.color = "silver";
            }
            
        }
/////////////////////////////////search devices///////////////////////////////////////////////////////
       
        var items = document.getElementById("all_data").querySelectorAll("#box");
        var search = document.getElementById('search');
        search.addEventListener('keyup',filter);
        function filter(e){
            var text = e.target.value.toLowerCase();
            items.forEach(function(item){
                var itemname = item.textContent;
                console.log(itemname)
                if(itemname.toLowerCase().indexOf(text)!= -1)
                {
                    item.style.display = "inline-block";
                }
                else{
                    item.style.display = "none";
                }
            });       
        }
///////////////////////////////////////////////////////////////////////////////////////////
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
////////////////////Image Preview before uploading//////////////////////////////////

    $("#imgFile").change(function(){
        console.log(1);
        filePreview(this);
    });

    function filePreview(input)
    {
        if(input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#preimg').remove();
            $('.imagepreview').append('<img src="'+e.target.result+'" width="250" height="200" id="preimg"/>');
        }
        reader.readAsDataURL(input.files[0]); 
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////

// $(document).ready(function(){
//     $('#search').keyup(function(){
//         // $('#box').hide();
//         var text = this.value;
       
//         if(text.replace(/\s/g, '').length)
//         {
//             console.log(text);
//             $.ajax({
//                 type: "POST",
//                 url: "search.php",
//                 data: { text : text },
//                 success: function(data) {
//                     $(data).appendTo('.all_data');
//                 }
//             });
//         }
//         // else{
//         //     $("#searchresult").remove();
//         //     $('#all_data').show();
//         // }
//     });
// });

/////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){

    if($(window).width() < 1036)
    {
        $('.settings').prepend("<div id='home'> <a href='../firstpage.php'><input type='button' value='Home'></a> </div>");
    }
    else{
        $('#home').remove();
    } 
});
</script>
</body>
</html>
