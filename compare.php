<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['name']))
{
echo "<h1 class='one'>Welcome</h1>"." "."<h1 style='display:inline'>".$_SESSION['name']."</h1>";
}
?>
<style>
.one{
    color:#3d0280;
    display:inline;
}
.log_out{
    margin-top:10px;
    float:right;
    display:inline;
}
.log_out input{
    width:200px;
    height:40px;
    background:#3d0280;
    font-size:20px;
    color:#fff;
    border:none;
    cursor:pointer;
}
.log_out input:hover{
    background:rgba(10, 25, 163,0.8);
}
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="..\style.css">
    <title>CompareAnything | Welcome </title>
</head>
<body>    
    <div class="modal" id="modal">
            <div class="modal_content" id="modal_content">
                <input type="button" value="X" id="cut">
                <h1>Please Rate</h1>
                <form class="rate">
                    <div id="rating5" class="ratingbox"></div>
                    <textarea type="text" placeholder="comment" required=""></textarea>
                    <input type="submit" value="comment">
                </form>
                </div> 
    </div> 
    <div class="log_out">
        <form method="POST" action="logout.php">
            <input type="submit" value="Log Out" name="logout">
        </form>
    </div>
    <div class="container-compare">
        <div class="searchbar">
                    <input type="text" class="search" placeholder="serch the device...">
                    <input type ="submit" value="search" class="s_btn">
        </div>
        <input type="button" id="add" value="Add items">
        <div class="all_data" id="all_data">
            <div class="data" id="box">
                        <div class="btn" >
                                <input type="button" value="Rate & comment" class="done">
                        </div> 
                        <input type="submit" id="show_comment" value="Show Comments">            
           </div>
            <div class="data">
                        <div class="btn">
                                <input type="button" value="Rate & comment" class="done">
                        </div>
                        <input type="submit" id="show_comment" value="Show Comments">   
            </div>
            <div class="data">
                        <div class="btn">
                                <input type="button" value="Rate & comment" class="done">
                        </div>
                        <input type="submit" id="show_comment" value="Show Comments" >   
            </div>
            <div class="data">
                        <div class="btn">
                                <input type="button" value="Rate & comment" class="done">
                        </div>
                        <input type="submit" id="show_comment" value="Show Comments">   
            </div>

            <!-- <div class="next_btn">
                <input type="button" id="next">
            </div> -->

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
       <a href="www.whatsapp.com" target="_blank" title="Whatsapp"><img src="..\images/what.jpg"></a>
       <a href="www.facebook.com" title="Facebook"><img src="..\images/face.jpg"></a>
       <a href="www.instagram.com" title="Instagram"><img src="..\images/insta.jpg"></a>
       <a href="www.google.com" title="Google"><img src="..\images/google.jpg"></a>
       
    </footer>

<script type="text/javascript">
       var modal = document.getElementById('modal');
       modal.style.visibility = 'hidden';
       document.getElementById('modal_content').style.visibility = "hidden";

    // document.getElementById('rate').onclick = open_modal;
    //    var rate_array = document.querySelectorAll('[type=button]');
    //    rate_array[0].onclick = open_modal;
    //    rate_array[1].onclick = open_modal;
    //    rate_array[2].onclick = open_modal;
    //    rate_array[3].onclick = open_modal;
    //    rate_array[4].onclick = open_modal;

// for creating new elements
        document.getElementById("add").onclick =  create_items;
        function create_items(e)
        {
            e.preventDefault();
            var alldata = document.getElementById("all_data");

            var div1 = document.createElement("div");
            div1.setAttribute("class","data");

            var div2 = document.createElement("div");
            div2.setAttribute("class","btn");

            var input1 = document.createElement("input");
            input1.type = "button" ;
            input1.value = "Rate & Comment";

            var input2  = document.createElement("input");
            input2.type = "submit";
            input2.value = "Show Comments";
            input2.id = "show_comment";

            all_data.appendChild(div1);

            div1.appendChild(div2);
            div1.appendChild(input2);

            div2.appendChild(input1);

            input1.onclick = open_modal;
      

        }
       
       var data = document.getElementById("all_data").querySelectorAll('[type=button]');
       var no_of_child = document.querySelectorAll('.data').length;

       for(i=0;i<no_of_child;i++)
       {
           data[i].onclick = open_modal;
       }

       function open_modal(e)
       {    
            e.preventDefault();
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
        }
       
    </script>
</body>
</html>
