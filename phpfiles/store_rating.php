<?php 
// session_start();
// include 'all_comment.php';
include 'connect.php';

if(isset($_POST['rate']))
{
  // $device_name = mysqli_real_escape_string($conn,$_POST['device_name']);
  $device_name = mysqli_real_escape_string($conn,$_POST['device_name']);
  $comment = mysqli_real_escape_string($conn,$_POST['comment']);
  $rate_count = $_POST['rate_count'];
  date_default_timezone_set('India/Mumbai');
  $date = date('d/m/Y');

  $usern = $_SESSION['name'];
    if($usern!='')
    {
        $sql = "INSERT INTO ratings(username,device_name,comment,rate_count,com_date) VALUES('$usern','$device_name','$comment','$rate_count','$date')";
        if(mysqli_query($conn,$sql) === TRUE)
        {
          $_SESSION['device_name'] = $device_name ;
          $_SESSION['rate_count'] = $rate_count ;
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