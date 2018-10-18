<?php
include "connect.php";

if(isset($_POST['reply']))
{
    $reply_by = mysqli_real_escape_string($conn,$_SESSION['name']);
   
    $reply_to = mysqli_real_escape_string($conn,$_SESSION['rate_id']);

    $comment = mysqli_real_escape_string($conn,$_POST["comment"]);
    
    date_default_timezone_set('India/Mumbai');
    $date = date('d/m/Y');
    // $q = "INSERT INTO reply(reply_to,comment) VALUES($reply_to','$comment')";

    $q  = "INSERT INTO reply VALUES('','$reply_by','$reply_to','$comment','$date')";
    $row = mysqli_query($conn,$q);
    if($row === TRUE)
    {
      header("Location: .\all_comment.php");
      exit();
    }
    else{
        echo "Something is wrong.";  
    }

}

?>