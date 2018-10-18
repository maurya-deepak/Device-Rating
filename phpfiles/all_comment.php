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
    <script src="jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="all_comment.css">
    <style>
        .searchbar i{
            position:absolute;
            top:38px;
            left:880px;
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
    </style>
<title>Compare.com | All Comments</title>

</head>
<body>
<!-- <div class="modal" id="modal">
    <div class="modal_content" id="modal_content">
        <input type="button" value="X" id="cut">
        <h1>Leave a Reply</h1>
        <form class="rate" method="POST" action="reply.php">
            <label>Replying to:</label>
            <input type="text" name="user_name" required="" id="username" value="" readOnly = true>
            <textarea type="text" placeholder="Write Your Comment Here...." required="" name="comment" id="comment"></textarea>
            <input type="submit" value="Reply" name="reply">
        </form>
    </div> 
</div>  -->
    <div class="head">
        <div class="searchbar">
            <input type="text" class="search" placeholder="  Search your device here..." id="search">
            <!-- <input type ="submit" value="search" class="s_btn"> -->
            <i class="fa fa-search" aria-hidden="true"></i> 
        </div>    
    </div>

    <!-- <input type="button" value="button" id="btn"> -->

    <div class="aside" id="aside">
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

 function reply(id)
 {
    on_comment  = id ;
    console.log(id);
    reply  = document.getElementById('input_reply').value();
    console.log(reply);
    // $.ajax({
    //     url: "show_comment.php",
    //     type: "POST",
    //     data: {on_comment: on_comment},
    //     success: function(data){
    //         Data = data;
    //         alert(Data);
    //         // $("#aside").after("<div id='comments_print'>"+Data+"</div>");
    //     }
    // });
 }
</script>

<!-- <script src="modal.js"></script> -->


</body>
</html>