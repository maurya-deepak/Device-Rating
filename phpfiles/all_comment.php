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
    <!-- <script src="jquery-3.3.1.min.js"></script> -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="all_comment.css">
    <style>
    
        .like{
            display:inline;
        }
    
        .searchbar i{
            position:absolute;
            top:38px;
            left:880px;
        }
        .comment_div{
            padding-top:20px;
            /* padding-bottom:20px; */
            border-bottom:2px solid silver;
        }
        .comment_div p{
            margin-top:10px;
            margin-bottom:10px;
            margin-left:20px;
            font-size:20px;
        }
        .reply{
           margin-top:10px;
           margin-left:30px;
        }
        .reply input{
            width:100px;
            height:30px;
            border:none;
            cursor:pointer;
            border:2px solid #3d0280;
            border-radius:6px;
            background: transparent;
            outline:none;
        }
        .reply input:hover{
            background:rgba(0,0,0,.3);
        }
        .modal_content #username
        {
            border:none;
        }
</style>
<title>Compare.com | All Comments</title>

</head>
<body>
<div class="modal" id="modal">
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
</div> 
    <div class="head">
        <div class="searchbar">
            <input type="text" class="search" placeholder="search your device here..." id="search">
            <!-- <input type ="submit" value="search" class="s_btn"> -->
            <i class="fa fa-search" aria-hidden="true"></i> 
        </div>    
    </div>
    <div class="aside">
           <ul>
             <?php
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
                ?> 
            
            </ul>
    </div>
    <div class="content" id="content">
        <div class="parent">
                <div id="all_comments">
                    <?php
                        $comm = mysqli_query($conn,"SELECT username,comment FROM ratings");
                        while($row=mysqli_fetch_assoc($comm))
                        {
                            $name=$row['username'];
                            $comment=$row['comment'];
                        ?>
                    
                        <div class="comment_div"> 
                            <h3 class="name"><?php echo $name;?></h4>
                            <p class="comments"><?php echo $comment;?></p>
                            <div class="reply">
                                <input type="button" name="reply" value="Reply" id="<?php echo $name; ?>">
                            </div>	
                        </div>

                    <?php
                        }
                    ?>
                </div>
         </div>
    </div>
<script src="modal.js"></script>
<script>
// document.getElementById("clicks").onclick = like_color;
// document.querySelector('[name="like"]').onclick = like_color;
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