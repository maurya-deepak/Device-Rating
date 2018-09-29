<?php
include 'connect.php';
//     unset($_SESSION['Reply']);
if(isset($_POST["allcomment"])|| isset($_SESSION['Reply']))
{  
    unset($_SESSION['Reply']);
    $query = "SELECT DISTINCT device_name FROM ratings";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script src="jquery-3.3.1.min.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="all_comment.css">
    <style>
        .comment .reply input[type="text"]
        {
            border:none;
            border-right:2px solid silver;
            outline:none;
            width:300px;
            height:25px;

        }
        .comment .reply input[type="button"]
        {
            margin:0;
            padding-left:0;
            border:none;
            outline:none;
            width:60px;
            height:25px;
            border-right:2px solid silver;
            background: transparent;  
        }
        .like{
            display:inline;
        }
</style>

    <title>Compare.com | All Comments</title>
</head>
<body>
    <div class="head">
        <div class="searchbar">
            <input type="text" class="search" id="search" placeholder="serch the device...">
            <input type ="submit" value="search" class="s_btn" >
        </div>    
        <div id="result"></div>
		</div>
    </div>
    <div class="aside">
           <ul>
            <!-- <?php
                if($count > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                ?>
                    <li>
                    <input type="button" value=<?php echo $row['device_name'] ?> name=<?php echo $row['device_name'] ?>>
                    </li>
                <?php
                    }   
                }
                ?> -->
            
            </ul>
    </div>
    <div class="content">
        <div class="parent">
            <div>
                <form method='post' action="" onsubmit="return reply();" id="container">
                    <input type="text" id="username" placeholder="Your Name" autocomplete="off">
                    <textarea id="comment" placeholder="Write Your Comment Here....."></textarea>  
                    <input type="submit" value="Post Comment" id="submit">
                </form>

                <div id="all_comments">
                <?php
                $comm = mysqli_query($conn,"SELECT username,comment FROM reply");
                while($row=mysqli_fetch_assoc($comm))
                {
                    $name=$row['username'];
                    $comment=$row['comment'];
                ?>
                
                <div class="comment_div"> 
                <p class="name"><strong>Posted By:</strong> <?php echo $name;?> <span style="float:right"></span></p>
                <p class="comments"><?php echo $comment;?></p>	
                </div>

                <?php
                }
                ?>
                </div>


<script>
// document.getElementById("clicks").onclick = like_color;
document.querySelector('[name="like"]').onclick = like_color;
function like_color() 
{
    event.preventDefault();
    document.getElementById("heart").style.color= "red";
}

function reply()
{
 var comm = document.getElementById('reply').value;
 if(comm && user)
 {
     $.ajax({
         type: 'POST',
         url: 'one.php',
         data:
         {
          user_name: user,
          user_comm: comm
         },
         success: function (response) {
             document.getElementById("all_comment").innerHTML = response;
             document.getElementById("reply").value = ''; 
         }
     });
 }
}

</script>
</body>
</html>