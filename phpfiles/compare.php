<?php
       include 'connect.php';
?>
<!DOCTYPE html>
<style>
.welcome{
    position:absolute;
    top:0px;
    left:0;
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
    width:100%;
    min-height:50px;
    font-family: sans-serif; 
    display:inline-block;

}
.log_out{
    padding:0;
    margin-top:10px;
    margin-right:10px;
    float:right;
    background: transparent;
    transition:.5s ease-in-out;
   
}
.log_out input{
    width:100px;
    height:40px;
    padding:10px 10px;
    background: transparent;
    font-size:16px;
    color:black;
    border:none;
    cursor:pointer;
    border:2px solid #3d0280;
    border-radius:6px;
   
}
.log_out:hover{
    border-radius:6px;
    background-color:#3d0280;
}
.log_out input:hover{
    color:#fff;
}
.all_comment{
    margin-top:10px;
    margin-right:10px;
    float:right;
    transition:.5s ease-in-out;
}
.all_comment input{
    width:140px;
    height:40px;
    padding:10px 10px;
    background:transparent;
    font-size:16px;
    border:none;
    border:2px solid #3d0280;
    border-radius:6px;
}
.all_comment:hover{
    border-radius:6px;
    background-color:#3d0280;
}
.all_comment input:hover{
    color:#fff;
}
.commented
{
position:absolute;
top:0;
left:30%;
}
.like i{
 margin-left:10px;
 font-size:25px;
 cursor:pointer;
 color:red;
}
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <link href="..\fontawesome-free-5.3.1-web/fontawesome-free-5.3.1-web/css/font-awesome.min.css" > -->
    <link rel="stylesheet" href="..\style.css">
    <!-- <link href="..\fontawesome-free-5.3.1-web/fontawesome-free-5.3.1-web/css/font-awesome.css" rel="stylesheet"> -->
    <title>CompareAnything | Welcome </title>
</head>
<body>    
<!-- rating and comment section popup starts here -->
    <div class="modal" id="modal">
            <div class="modal_content" id="modal_content">
                <input type="button" value="X" id="cut">
                <h1>Please Rate</h1>
                <form class="rate" method="POST" action="store_rating.php">
                    <input type="text" name="device_name" placeholder="Device Name" required="" id="device">
                    <textarea type="text" placeholder="Write Your Comment Here...." required="" name="comment" id="comment"></textarea>
                    <input type="submit" value="comment" name="rate">
                </form>
                </div> 
    </div> 
<!-- rating and comment section popup end here -->

<!-- head part stats -->
    <div class="head" id="head"> 
                <div class="all_comment">
                    <form method="POST" action="all_comment.php">
                        <input type="submit" value="Show comments" name="allcomment">
                    </form>
                </div>
                <div class="log_out">
                    <form method="POST" action="logout.php">
                        <input type="submit" value="Log Out" name="logout">
                    </form>
                 </div>
            </ul>
    </div>
    <div class="setting_show">
      
    </div>
   
<!-- head part end -->  
<?php 
 
        if(isset($_SESSION['name']))
        {
            // prints username who has logined
            echo "<h1 class='welcome'>Welcome ".$_SESSION['name']."</h1>";
        }

?>
<?php
        if(isset($_SESSION['comment']))
        {
            // prints on which device user commented
            echo "<p class='welcome commented'>Thank you for your rating and comment on ".$_SESSION['comment']."</p>";
            /* after reload session will not show */
            // unset($_SESSION['comment']);
            // session_destroy();
        }

?>

<!-- main comatainer conatains devices -->

    <div class="container-compare">
        <div class="searchbar" id="full_width_searchbar">
                    <input type="text" class="search" placeholder="search your devices" id="search">
                    <!-- <input type ="submit" value="search" class="s_btn"> -->
                    <i class="fa fa-search" aria-hidden="true"></i>        
        </div>
       
        <div class="all_data" id="all_data">

           <?php 
            $sqql = "SELECT DISTINCT device_name FROM ratings";
            $result = mysqli_query($conn,$sqql);
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
            <div class="data" id="box">
                        <div class="btn" >
                            <label class="label"><?php echo $row['device_name'];?></label>
                            <input type="button" value="Rate & comment" class="done" id ="<?php echo $row['device_name'];?>">
                        </div> 
           </div>
           <?php
            }
           ?>
           <div class="searchbar">
                <input type="button" id="add" value="Not find your device ? Add device">
           </div>
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
<footer class="footer">
    <h4>Connect with us on</h4>
    <div class="footer_cont_img">
        <a href="www.whatsapp.com" target="_blank" title="Whatsapp"><img src="../images/what.jpg"></a>
        <a href="www.facebook.com" title="Facebook"><img src="../images/face.jpg"></a>
        <a href="www.instagram.com" title="Instagram"><img src="../images/insta.jpg"></a>
        <a href="www.google.com" title="Google"><img src="../images/google.jpg"></a>
    </div>
</footer>

<script type="text/javascript">
       var name;
       var device_name;
       var modal = document.getElementById('modal');
       modal.style.visibility = 'hidden';
       document.getElementById('modal_content').style.visibility = "hidden";
// for creating new elements
        document.getElementById("add").onclick  =  create_items;
        function create_items(e)
        {
            // e.preventDefault();
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

       var data = document.getElementById("all_data").querySelectorAll('[type=button]');
       var no_of_child = document.querySelectorAll('.data').length;

       for(i=0;i<no_of_child;i++)
       {
           data[i].onclick = open_modal;    
       }
       document.getElementById('add').onclick = open_modal;

       function open_modal(e)
       {    
            // e.preventDefault();
            device_name = this.id;
            if(device_name!== "add" )
            {
                var device_name_on_modal = document.getElementById("device");
                device_name_on_modal.value = device_name;
            }
            var modal1 = document.getElementById('modal');
            modal1.style.visibility = "visible";
            document.getElementById('modal_content').style.visibility = "visible";
            modal1.style.animation = "popup 350ms ease-in-out forwards";
            document.getElementById('modal_content').style.animation = "popup 350ms ease-in-out forwards";
       }

       document.getElementById('cut').onclick = close_modal ;
       
       function close_modal(e)
       {    e.preventDefault();
            var data = document.getElementById('modal');
            data.style.visibility = "hidden";
            document.getElementById('modal_content').style.visibility = "hidden";
            data.style.animation = "popin 350ms ease-in-out 1 forwards";
            document.getElementById('modal_content').style.animation = "popin 350ms ease-in-out 1 forwards";
            // document.getElementById('device').value="";
            // document.getElementById('comment').value="";
        }
        // search devices
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




</script>
</body>
</html>
