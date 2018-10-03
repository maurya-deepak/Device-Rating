<?php
include "connect.php";

if(isset($_POST['reply']))
{
    $reply_to = mysqli_real_escape_string($conn,$_POST["user_name"]);
    $comment = mysqli_real_escape_string($conn,$_POST["comment"]);
    // $sql = "SELECT * FROM reply WHERE username = '$reply_to'";
    $sql = " INSERT INTO reply(username,commment) VALUES('$reply_to','$comment')";
    $result = mysqli_query($sql);
    
}

?>