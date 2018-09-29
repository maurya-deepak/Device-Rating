<?php 
// session_start();
// include 'all_comment.php';
include 'connect.php';

if(isset($_POST['rate']))
{
  // $device_name = mysqli_real_escape_string($conn,$_POST['device_name']);
  $device_name = mysqli_real_escape_string($conn,$_POST['device_name']);
  $comment = mysqli_real_escape_string($conn,$_POST['comment']);
  $usern = $_SESSION['name'];
    if($usern!='')
    {
        $sql = "INSERT INTO ratings(username,device_name,comment) VALUES('$usern','$device_name','$comment')";
        if(mysqli_query($conn,$sql) === TRUE)
        {
          $_SESSION['comment'] = $device_name ;
          header("Location: ../phpfiles/compare.php");
          exit();
        }
        else
        {
        header("Location: ../phpfiles/compare.php?error");
        exit();
        }
    }
else{
    echo "username not there";
  }
}



?>