<?php
include 'connect.php';
//     unset($_SESSION['Reply']);
// if(isset($_POST["allcomment"])|| isset($_SESSION['Reply']))
// {  
    // unset($_SESSION['Reply']);
    $query = "SELECT DISTINCT device_name FROM ratings";
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
    <style>
        .searchbar i{
            position:absolute;
            top:38px;
            left:77.5%;
        }
        #comment_block{
            border-bottom:2px solid silver;
            background-color:rgba(199, 197, 197,0.4);
        }
        #username_comm{
            display:inline;
            font-size:26px;
            padding:0px 20px;
        }
        #comm_date{
            display:inline;
            font-size:20px; 
        }
        #comment{
            font-size:24px;
            padding:0 20px; 
        }
        #comments_print{
            width:80%;
            float:right;
        }
        #like{
            margin-top:5px;
            margin-left:15px;
            font-size:28px;
        }
        #cancel{
            width:30px;
            height:30px;
            border:none;
            background:#3d0280;
            color: #fff;
            border-radius: 4px;
        }
        #comment_block i{
            margin:10px 10px;
            color:red;
            font-size:24px;
        }
        #show_device
        {
            margin-top:10px;
            height:30px;
            font-size:28px;
        }

    </style>
<title>Compare.com | All Comments</title>

</head>
<body>
    <div class="head" >
        <div class="searchbar">
            <input type="text" class="search" placeholder="Search your device here..." id="search">
            <!-- <input type ="submit" value="search" class="s_btn"> -->
            <i class="fa fa-search" aria-hidden="true"></i> 
        </div>    
    </div>
    <i class="fas fa-bars" id="show_device"></i>
    <div class="aside" id="aside">
           <input type="button" id="cancel" value="X">
           <ul>
             <?php
                if($count > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                ?>
                    <li>
                        <input type="button" value="<?php echo $row['device_name'] ?>" id="<?php echo $row['device_name'] ?>" name="<?php echo $row['device_name'] ?>" onclick= "myfunction(this.id)">
                    </li>
                <?php
                    }   
                }
                ?> 
            </ul>
    </div>  
      
<script>

// document.getElementById('btn').onclick = myfunction;
 function myfunction(id)
 {
    $("#comments_print").remove();
    device_name = id;
    var dd = document.getElementById( device_name );
    if(dd.style.color != "gray")
    {
        document.getElementById( device_name ).style.color = "gray"; 
    }
    else{
        document.getElementById( device_name ).style.color = "#fff"; 
    }
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
        
    $(".aside").show();
    $("#show_device").hide();

    $("#cancel").on("click",function(){
        $(".aside").hide();
        $("#show_device").show();
    });

    $("#show_device").on("click",function(){
      $(".aside").show();
      $("#show_device").hide();
    });

        if ($(window).width() < 1000)
        {
           $(".head").hide();
           $("#cancel").show();
           
        } else 
        {
            $(".head").show();
            $("#cancel").hide();
        }
   
    $(window).resize(function()
     {
        if ($(this).width() < 1100)
        {
            $(".head").hide();
            $("#cancel").show();
        } else   
        {
            $(".head").show();
            $("#cancel").hide();
        }
    });
</script>
</body>
</html>